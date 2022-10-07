<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatisticsController extends Controller
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
            $totalRecords = Statistic::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Statistic::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

            $statistics = Statistic::select('statistics.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('statistics.id', 'desc')
                ->get();


            $records = [];

            foreach($statistics as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.statistics.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="30">',
                       'name' => $item->name,
                       'number' => $item->number,
                       'actions' => view('control-panel.statistics.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.statistics.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|numeric',
            'image' => 'required|mimes:png',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('statistics','public');
        }

        Statistic::create([
            'name' => $request->name,
            'number' => $request->number,
            'image' => $image,
        ]);

        return redirect()->route('statistics.index')->with('success','تم الاضافة بنجاح');

    }

    public function update(Request $request, Statistic $statistic)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|numeric',
            'image' => 'nullable|mimes:png',
        ]);

        $image = $statistic->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('statistics','public');
        }

        $statistic->update([
            'name' => $request->name,
            'number' => $request->number,
            'image' => $image,
        ]);

        return redirect()->route('statistics.index')->with('success','تم التعديل بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {

        $statistic->delete();
        Storage::disk('public')->delete($statistic->image);
        return redirect()->route('statistics.index')->with('success',__('تم الحذف بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $statistic = Statistic::FindOrFail($recordId);
                $this->delete($statistic);
            }//end of for each
        }else{
            return redirect()->route('statistics.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('statistics.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Statistic $statistic)
    {
        $statistic->delete();
        Storage::disk('public')->delete($statistic->image);
    }
}
