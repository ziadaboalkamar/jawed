<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
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
            $totalRecords = Service::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Service::select('count(*) as allcount')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->count();

            $services = Service::select('services.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('services.id', 'desc')
                ->get();


            $records = [];

            foreach($services as $item)
            {
                $records[] = [
                    'record_select' =>view('control-panel.products.datatable.record',[ 'item' => $item ])->render(),
                    'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                    'name' => $item->name,
                    'actions' => view('control-panel.products.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.services.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required|string',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('services','public');
        }

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('services.index')->with('success','تم اضافة الخدمة بنجاح');

    }

    public function update(Request $request, Service $service)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'description' => 'required|string',
        ]);

        $image = $service->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('services','public');
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('services.index')->with('success','تم التعديل على الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Storage::disk('public')->delete($service->image);
        return redirect()->route('services.index')->with('success',__('تم حذف الخدمة بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $service = Service::FindOrFail($recordId);
                $this->delete($service);
            }//end of for each
        }else{
            return redirect()->route('services.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('services.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Service $service)
    {
        $service->delete();
        Storage::disk('public')->delete($service->image);
    }
}
