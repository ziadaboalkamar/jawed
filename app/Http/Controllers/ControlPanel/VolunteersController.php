<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteersController extends Controller
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
            $totalRecords = Volunteer::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Volunteer::select('count(*) as allcount')
                                                ->where('full_name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('email', 'like', '%' . $searchValue . '%')
                                                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                                                ->count();

            $volunteers = Volunteer::select('volunteers.*')
                ->where('full_name', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%')
                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('volunteers.id', 'desc')
                ->get();


            $records = [];

            foreach($volunteers as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.volunteers.datatable.record',[ 'item' => $item ])->render(),
                       'full_name' => $item->full_name,
                       'email' => $item->email,
                       'phone' => $item->phone,
                       'domin' => $item->domin,
                       'status' => $item->status,
                       'actions' => view('control-panel.volunteers.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.volunteers.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteers.index')->with('success',__('تم حذف الطلب بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $volunteer = Volunteer::FindOrFail($recordId);
                $this->delete($volunteer);
            }//end of for each
        }else{
            return redirect()->route('volunteers.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('volunteers.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Volunteer $volunteer)
    {
        $volunteer->delete();
    }

    public function updateStatus(Volunteer $volunteer)
    {
        # code...
        if($volunteer->status == '0'){
            $volunteer->update([
                'status' => '1'
            ]);
        }

        return response()->json([
            'status' => 'done',
        ]);

    }
}
