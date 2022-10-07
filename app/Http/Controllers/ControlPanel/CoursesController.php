<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
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
            $totalRecords = Course::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Course::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('price', 'like', '%' . $searchValue . '%')
                                                ->orWhere('trainer', 'like', '%' . $searchValue . '%')
                                                ->count();

            $courses = Course::select('courses.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%')
                ->orWhere('trainer', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('courses.id', 'desc')
                ->get();


            $records = [];

            foreach($courses as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.courses.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                       'name' => $item->name,
                       'price' => $item->price,
                       'trainer' => $item->trainer,
                       'date' => $item->date,
                       'status' => $item->status,
                       'actions' => view('control-panel.courses.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.courses.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'trainer' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'period' => 'required|numeric',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $data = $request->except('image');
        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('courses','public');
        }

        $data['image'] = $image;
        Course::create($data);

        return redirect()->route('courses.index')->with('success','تم اضافة الدورة بنجاح');

    }

    public function update(Request $request, Course $course)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'trainer' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'period' => 'required|numeric',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $data = $request->except('image');

        $image = $course->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('courses','public');
        }
        $data['image'] = $image;

        $course->update($data);

        return redirect()->route('courses.index')->with('success','تم التعديل على الدورة بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Storage::disk('public')->delete($course->image);
        return redirect()->route('courses.index')->with('success',__('تم حذف الدورة بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $course = Course::FindOrFail($recordId);
                $this->delete($course);
            }//end of for each
        }else{
            return redirect()->route('courses.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('courses.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Course $course)
    {
        $course->delete();
        Storage::disk('public')->delete($course->image);
    }
}
