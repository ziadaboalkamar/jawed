<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\ClientOpinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientOpinionController extends Controller
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
            $totalRecords = ClientOpinion::select('count(*) as allcount')->count();
            $totalRecordswithFilter = ClientOpinion::select('count(*) as allcount')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('client_position', 'like', '%' . $searchValue . '%')
                ->count();

            $client_opinions = ClientOpinion::select('client_opinions.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('client_position', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('client_opinions.id', 'desc')
                ->get();


            $records = [];

            foreach($client_opinions as $item)
            {
                $records[] = [
                    'record_select' =>view('control-panel.client_opinions.datatable.record',[ 'item' => $item ])->render(),
                    'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                    'name' => $item->name,
                    'client_position' => $item->client_position,
                    'actions' => view('control-panel.client_opinions.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.client_opinions.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'message' => 'required|string',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('client_opinions','public');
        }

        ClientOpinion::create([
            'name' => $request->name,
            'client_position' => $request->client_position,
            'message' => $request->message,
            'image' => $image,
        ]);

        return redirect()->route('client-opinions.index')->with('success','تم اضافة الرأي بنجاح');

    }

    public function update(Request $request, ClientOpinion $client_opinion)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'message' => 'required|string',
        ]);

        $image = $client_opinion->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('client_opinions','public');
        }

        $client_opinion->update([
            'name' => $request->name,
            'client_position' => $request->client_position,
            'message' => $request->message,
            'image' => $image,
        ]);

        return redirect()->route('client-opinions.index')->with('success','تم التعديل على الرأي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientOpinion $client_opinion)
    {
        $client_opinion->delete();
        Storage::disk('public')->delete($client_opinion->image);
        return redirect()->route('client-opinions.index')->with('success',__('تم حذف الرأي بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $client_opinion = ClientOpinion::FindOrFail($recordId);
                $this->delete($client_opinion);
            }//end of for each
        }else{
            return redirect()->route('client-opinions.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('client-opinions.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(ClientOpinion $client_opinion)
    {
        $client_opinion->delete();
        Storage::disk('public')->delete($client_opinion->image);
    }
}
