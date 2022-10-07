<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
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
            $totalRecords = Faq::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Faq::select('count(*) as allcount')
                ->where('question', 'like', '%' . $searchValue . '%')
                ->count();

            $faqs = Faq::select('faqs.*')
                ->where('question', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('faqs.id', 'desc')
                ->get();


            $records = [];

            foreach($faqs as $item)
            {
                $records[] = [
                    'record_select' =>view('control-panel.faqs.datatable.record',[ 'item' => $item ])->render(),
                    'question' => $item->question,
                    'actions' => view('control-panel.faqs.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.faqs.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        Faq::create([
            'question' => $request->question,
            'description' => $request->description,
        ]);

        return redirect()->route('faqs.index')->with('success','تم اضافة السؤال بنجاح');

    }

    public function update(Request $request, Faq $faq)
    {
        # code...
        $request->validate([
            'question' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $faq->update([
            'question' => $request->question,
            'description' => $request->description,
        ]);

        return redirect()->route('faqs.index')->with('success','تم التعديل على السؤال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success',__('تم حذف السؤال بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $faq = Faq::FindOrFail($recordId);
                $this->delete($faq);
            }//end of for each
        }else{
            return redirect()->route('faqs.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('faqs.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Faq $faq)
    {
        $faq->delete();
    }
}
