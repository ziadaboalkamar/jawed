<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $search_arr = $request->get('search');
            $searchValue = $search_arr['value']; // Search value
            $totalRecords = CourseUser::where('course_id',$course->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = CourseUser::where('course_id',$course->id)->select('count(*) as allcount')
                                                ->whereHas('user', function ($query) use ($searchValue) {
                                                    return $query->where('full_name', 'like', '%' . $searchValue . '%');
                                                })
                                                ->count();

            $course_users = CourseUser::where('course_id',$course->id)->select('course_users.*')
                ->whereHas('user', function ($query) use ($searchValue) {
                    return $query->where('full_name', 'like', '%' . $searchValue . '%');
                })
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('course_users.id', 'desc')
                ->get();


            $records = [];

            foreach($course_users as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.courses.users.datatable.record',[ 'item' => $item ])->render(),
                       'name' => $item->user->full_name,
                       'status' => $item->status,
                       'payment_type' => $item->payment_type,
                       'actions' => view('control-panel.courses.users.datatable.buttons',[ 'item' => $item ])->render() ,
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

        return view('control-panel.courses.users.index', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, CourseUser $course_user)
    {
        # code...
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $course_user->update($request->all());

        return redirect()->route('course-users.index',$course_user->course_id)->with('success','تم التعديل بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseUser $course_user)
    {
        $course_user->delete();
        Storage::disk('public')->delete($course_user->payment_file);
        return redirect()->route('course-users.index',$course_user->course_id)->with('success',__('تم الحذف بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $course_user = CourseUser::FindOrFail($recordId);
                $this->delete($course_user);
            }//end of for each
        }else{
            return redirect()->back()->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->back()->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(CourseUser $course_user)
    {
        $course_user->delete();
        Storage::disk('public')->delete($course_user->payment_file);
    }
}
