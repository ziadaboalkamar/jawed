<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoliciesController extends Controller
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
            $totalRecords = Policy::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Policy::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

            $policies = Policy::select('policies.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('policies.id', 'desc')
                ->get();


            $records = [];

            foreach($policies as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.policies.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'actions' => view('control-panel.policies.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.policies.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:png,jpg,pdf',
        ]);

        $file = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file')->store('policies','public');
        }

        Policy::create([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('policies.index')->with('success','تم اضافة السياسة بنجاح');

    }

    public function update(Request $request, Policy $policy)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:png,jpg,pdf',
        ]);

        $file = $policy->file;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            Storage::disk('public')->delete($file);
            $file = $request->file('file')->store('policies','public');
        }

        $policy->update([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('policies.index')->with('success','تم التعديل على السياسة بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {

        $policy->delete();
        Storage::disk('public')->delete($policy->file);
        return redirect()->route('policies.index')->with('success',__('تم حذف السياسة بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $policy = Policy::FindOrFail($recordId);
                $this->delete($policy);
            }//end of for each
        }else{
            return redirect()->route('policies.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('policies.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Policy $policy)
    {
        $policy->delete();
        Storage::disk('public')->delete($policy->file);
    }
}
