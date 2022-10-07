<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrariesController extends Controller
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
            $totalRecords = Library::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Library::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

            $libraries = Library::select('libraries.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('libraries.id', 'desc')
                ->get();


            $records = [];

            foreach($libraries as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.libraries.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'actions' => view('control-panel.libraries.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.libraries.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:png,jpg,pdf',
        ]);

        $file = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $file = $request->file('file')->store('libraries','public');
        }

        Library::create([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('libraries.index')->with('success','تم اضافة الملف بنجاح');

    }

    public function update(Request $request, Library $library)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:png,jpg,pdf',
        ]);

        $file = $library->file;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            Storage::disk('public')->delete($file);
            $file = $request->file('file')->store('libraries','public');
        }

        $library->update([
            'name' => $request->name,
            'file' => $file,
        ]);

        return redirect()->route('libraries.index')->with('success','تم التعديل على الملف بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {

        $library->delete();
        Storage::disk('public')->delete($library->file);
        return redirect()->route('libraries.index')->with('success',__('تم حذف الملف بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $library = Library::FindOrFail($recordId);
                $this->delete($library);
            }//end of for each
        }else{
            return redirect()->route('libraries.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('libraries.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Library $library)
    {
        $library->delete();
        Storage::disk('public')->delete($library->file);
    }
}
