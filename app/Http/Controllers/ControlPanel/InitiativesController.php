<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InitiativesController extends Controller
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
            $totalRecords = Initiative::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Initiative::select('count(*) as allcount')
                                                ->where('title', 'like', '%' . $searchValue . '%')
                                                ->orWhere('sub_title', 'like', '%' . $searchValue . '%')
                                                ->count();

            $initiatives = Initiative::select('initiatives.*')
                ->where('title', 'like', '%' . $searchValue . '%')
                ->orWhere('sub_title', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('initiatives.id', 'desc')
                ->get();


            $records = [];

            foreach($initiatives as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.initiatives.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                       'title' => $item->title,
                       'actions' => view('control-panel.initiatives.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.initiatives.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('initiatives','public');
        }

        Initiative::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'image' => $image,
        ]);

        return redirect()->route('initiatives.index')->with('success','تم اضافة المبادرة بنجاح');

    }

    public function update(Request $request, Initiative $initiative)
    {
        # code...
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
        ]);

        $image = $initiative->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('initiatives','public');
        }

        $initiative->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'image' => $image,
        ]);

        return redirect()->route('initiatives.index')->with('success','تم التعديل على المبادرة بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initiative $initiative)
    {
        $initiative->delete();
        Storage::disk('public')->delete($initiative->image);
        return redirect()->route('initiatives.index')->with('success',__('تم حذف المبادرة بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $initiative = Initiative::FindOrFail($recordId);
                $this->delete($initiative);
            }//end of for each
        }else{
            return redirect()->route('initiatives.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('initiatives.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Initiative $initiative)
    {
        $initiative->delete();
        Storage::disk('public')->delete($initiative->image);
    }
}
