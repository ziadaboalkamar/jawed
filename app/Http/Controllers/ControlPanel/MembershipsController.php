<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipDescription;
use Illuminate\Http\Request;

class MembershipsController extends Controller
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
            $totalRecords = Membership::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Membership::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('city', 'like', '%' . $searchValue . '%')
                                                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                                                ->count();

            $memberships = Membership::select('memberships.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('city', 'like', '%' . $searchValue . '%')
                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('memberships.id', 'desc')
                ->get();


            $records = [];

            foreach($memberships as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.memberships.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'city' => $item->city,
                       'phone' => $item->phone,
                       'type' => $item->type,
                       'status' => $item->status,
                       'actions' => view('control-panel.memberships.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.memberships.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $membership->delete();
        return redirect()->route('memberships.index')->with('success',__('تم حذف الطلب بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $membership = Membership::FindOrFail($recordId);
                $this->delete($membership);
            }//end of for each
        }else{
            return redirect()->route('memberships.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('memberships.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Membership $membership)
    {
        $membership->delete();
    }

    public function updateStatus(Membership $membership)
    {
        # code...
        if($membership->status == '0'){
            $membership->update([
                'status' => '1'
            ]);
        }

        return response()->json([
            'status' => 'done',
        ]);

    }

    public function membershipDescription()
    {
        # code...
        return view('control-panel.memberships.description',[
            'membership'  => MembershipDescription::first(),
        ]);
    }

    public function membershipDescriptionStore(Request $request)
    {
        # code...
        $membership = MembershipDescription::first();

        if(!$membership){
            $request->validate([
                'goals' => 'required',
                'features' => 'required',
                'types' => 'required|array',
                'types.*.name' => 'string',
            ]);

            $types = [];

            foreach($request->types as $item)
            {
                $types[] = $item['name'];
            }

            $data = $request->except('types');

            $types = json_encode($types);
            $data['types'] = $types;

            MembershipDescription::create($data);
        } else {
            $request->validate([
                'goals' => 'required',
                'features' => 'required',
                'types' => 'required|array',
                'types.*.name' => 'string',
            ]);

            $types = [];

            foreach($request->types as $item)
            {
                $types[] = $item['name'];
            }

            $data = $request->except('types');

            $types = json_encode($types);
            $data['types'] = $types;

            $membership->update($data);
        }

        return redirect()->route('memdership-description')->with('success', 'تم التعديل بنجاح');
    }
}
