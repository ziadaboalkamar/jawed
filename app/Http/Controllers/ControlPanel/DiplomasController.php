<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use App\Models\DiplomaGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiplomasController extends Controller
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
            $totalRecords = Diploma::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Diploma::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('price', 'like', '%' . $searchValue . '%')
                                                ->orWhere('trainer', 'like', '%' . $searchValue . '%')
                                                ->count();

            $diplomas = Diploma::select('diplomas.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%')
                ->orWhere('trainer', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('diplomas.id', 'desc')
                ->get();


            $records = [];

            foreach($diplomas as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.diplomas.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                       'name' => $item->name,
                       'price' => $item->price,
                       'trainer' => $item->trainer,
                       'certificate' => $item->certificate,
                       'status' => $item->status,
                       'actions' => view('control-panel.diplomas.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.diplomas.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'trainer' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'period' => 'required|numeric',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
            'certificate' => 'required|string',
            'goals' => 'required|array',
            'goals.*.name' => 'required|string'
        ]);

        $data = $request->except(['image', 'goals']);
        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('diplomas','public');
        }

        $data['image'] = $image;
        $diploma = Diploma::create($data);

        foreach($request->goals as $goal)
        {
            DiplomaGoal::create([
                'diploma_id' => $diploma->id,
                'name' => $goal['name'],
            ]);
        }

        return redirect()->route('diplomas.index')->with('success','تم اضافة الدبلوم بنجاح بنجاح');

    }

    public function update(Request $request, Diploma $diploma)
    {
        # code...
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'trainer' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'period' => 'required|numeric',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
            'certificate' => 'required|string',
            'goals' => 'required|array',
            'goals.*' => 'nullable|string'

        ]);
        $data = $request->except(['image', 'goals']);

        $image = $diploma->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('diplomas','public');
        }
        $data['image'] = $image;

        $diploma->update($data);

        $diploma->goals()->delete();
        foreach($request->goals as $goal)
        {
            if($goal){
                DiplomaGoal::create([
                    'diploma_id' => $diploma->id,
                    'name' => $goal,
                ]);
            }
        }

        return redirect()->route('diplomas.index')->with('success','تم التعديل على الدبلوم بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diploma $diploma)
    {
        $diploma->delete();
        Storage::disk('public')->delete($diploma->image);
        return redirect()->route('diplomas.index')->with('success',__('تم حذف الدبلوم بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $diploma = Diploma::FindOrFail($recordId);
                $this->delete($diploma);
            }//end of for each
        }else{
            return redirect()->route('diplomas.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('diplomas.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Diploma $diploma)
    {
        $diploma->delete();
        Storage::disk('public')->delete($diploma->image);
    }
}
