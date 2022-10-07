<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\DiplomaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersDiplomasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Diploma $diploma)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $search_arr = $request->get('search');
            $searchValue = $search_arr['value']; // Search value
            $totalRecords = DiplomaUser::where('diploma_id',$diploma->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = DiplomaUser::where('diploma_id',$diploma->id)->select('count(*) as allcount')
                                                ->whereHas('user', function ($query) use ($searchValue) {
                                                    return $query->where('full_name', 'like', '%' . $searchValue . '%');
                                                })
                                                ->count();

            $diploma_users = DiplomaUser::where('diploma_id',$diploma->id)->select('diploma_users.*')
                ->whereHas('user', function ($query) use ($searchValue) {
                    return $query->where('full_name', 'like', '%' . $searchValue . '%');
                })
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('diploma_users.id', 'desc')
                ->get();


            $records = [];

            foreach($diploma_users as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.diplomas.users.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->user->full_name,
                       'status' => $item->status,
                       'payment_type' => $item->payment_type,
                       'actions' => view('control-panel.diplomas.users.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.diplomas.users.index', [
            'diploma' => $diploma,
        ]);
    }

    public function update(Request $request, DiplomaUser $diploma_user)
    {
        # code...
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $diploma_user->update($request->all());

        return redirect()->route('diploma-users.index',$diploma_user->diploma_id)->with('success','تم التعديل بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiplomaUser $diploma_user)
    {
        $diploma_user->delete();
        Storage::disk('public')->delete($diploma_user->payment_file);
        return redirect()->route('diploma-users.index',$diploma_user->diploma_id)->with('success',__('تم الحذف بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $diploma_user = DiplomaUser::FindOrFail($recordId);
                $this->delete($diploma_user);
            }//end of for each
        }else{
            return redirect()->back()->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->back()->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(DiplomaUser $diploma_user)
    {
        $diploma_user->delete();
        Storage::disk('public')->delete($diploma_user->payment_file);
    }
}
