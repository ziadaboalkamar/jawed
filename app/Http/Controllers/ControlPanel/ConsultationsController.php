<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
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
            $totalRecords = Consultation::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Consultation::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('email', 'like', '%' . $searchValue . '%')
                                                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                                                ->count();

            $consultations = Consultation::select('consultations.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%')
                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('consultations.id', 'desc')
                ->get();


            $records = [];

            foreach($consultations as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.consultations.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'email' => $item->email,
                       'phone' => $item->phone,
                       'city' => $item->city,
                       'status' => $item->status,
                       'actions' => view('control-panel.consultations.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.consultations.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('consultations.index')->with('success',__('تم حذف الاستشارة بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $consultation = Consultation::FindOrFail($recordId);
                $this->delete($consultation);
            }//end of for each
        }else{
            return redirect()->route('consultations.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('consultations.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Consultation $consultation)
    {
        $consultation->delete();
    }

    public function updateStatus(Consultation $consultation)
    {
        # code...
        if($consultation->status == '0'){
            $consultation->update([
                'status' => '1'
            ]);
        }

        return response()->json([
            'status' => 'done',
        ]);

    }
}
