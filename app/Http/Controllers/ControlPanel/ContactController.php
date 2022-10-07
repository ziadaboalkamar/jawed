<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $search_arr = $request->get('search');
            $searchValue = $search_arr['value']; // Search value
            $totalRecords = Contact::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Contact::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('email', 'like', '%' . $searchValue . '%')
                                                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                                                ->count();

            $contacts = Contact::select('contacts.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%')
                ->orWhere('phone', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('contacts.id', 'desc')
                ->get();


            $records = [];

            foreach($contacts as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.contacts.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->name,
                       'email' => $item->email,
                       'phone' => $item->phone,
                       'date' => Carbon::parse($item->created_at)->format('Y-m-d'),
                       'status' => $item->status,
                       'actions' => view('control-panel.contacts.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.contacts.index');
    }

    public function show(Contact $contact)
    {
        # code...
        if($contact->status == "0"){

            $contact->update([
                'status' => "1"
            ]);
        }

        return response()->json([
            'status' => 'done',
        ]);
    }

    public function destroy(Contact $contact)
    {
        # code...
        $contact->delete();
        return redirect()->route('contacts.index')->with('success',__('Message Deleted Successfully!'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $contact = Contact::FindOrFail($recordId);
                $this->delete($contact);
            }//end of for each
        }else{
            return redirect()->route('contacts.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('contacts.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Contact $contact)
    {
        $contact->delete();
    }
}
