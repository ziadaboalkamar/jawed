<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $search_arr = $request->get('search');
            $searchValue = $search_arr['value']; // Search value
            $totalRecords = Partner::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Partner::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

            $partners = Partner::select('partners.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('partners.id', 'desc')
                ->get();


            $records = [];

            foreach($partners as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.partner.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                       'name' => $item->name,
                       'actions' => view('control-panel.partner.datatable.buttons',[ 'item' => $item ])->render() ,
                    ];
            }

            $response = [
                        "draw" => intval($draw),
                        "iTotalRecords" => $totalRecords,
                        "iTotalDisplayRecords" => $totalRecordswithFilter,
                        "aaData" => $records
                    ];

            return response()->json($response);

        }

        return view('control-panel.partner.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('partners','public');
        }

        Partner::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return redirect()->route('partners.index')->with('success','تم اضافة الشريك بنجاح');

    }

    public function update(Request $request, Partner $partner)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
        ]);

        $image = $partner->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('partners','public');
        }

        $partner->update([
            'name' => $request->name,
            'image' => $image,
        ]);

        return redirect()->route('partners.index')->with('success','تم التعديل على الشريك بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {

        $partner->delete();
        Storage::disk('public')->delete($partner->image);
        return redirect()->route('partners.index')->with('success',__('تم حذف الشريك بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $partner = Partner::FindOrFail($recordId);
                $this->delete($partner);
            }//end of for each
        }else{
            return redirect()->route('partners.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('partners.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Partner $partner)
    {
        $partner->delete();
        Storage::disk('public')->delete($partner->image);
    }
}
