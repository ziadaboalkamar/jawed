<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
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
            $totalRecords = Report::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Report::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

            $reports = Report::select('reports.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('reports.id', 'desc')
                ->get();


            $records = [];

            foreach($reports as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.reports.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'actions' => view('control-panel.reports.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.reports.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:png,jpg,pdf',
        ]);

        $file = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file')->store('reports','public');
        }

        Report::create([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('reports.index')->with('success','تم اضافة التقرير بنجاح');

    }

    public function update(Request $request, Report $report)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:png,jpg,pdf',
        ]);

        $file = $report->file;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            Storage::disk('public')->delete($file);
            $file = $request->file('file')->store('reports','public');
        }

        $report->update([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('reports.index')->with('success','تم التعديل على التقرير بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {

        $report->delete();
        Storage::disk('public')->delete($report->file);
        return redirect()->route('reports.index')->with('success',__('تم حذف التقرير بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $report = Report::FindOrFail($recordId);
                $this->delete($report);
            }//end of for each
        }else{
            return redirect()->route('reports.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('reports.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Report $report)
    {
        $report->delete();
        Storage::disk('public')->delete($report->file);
    }
}
