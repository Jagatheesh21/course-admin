<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Module;
use App\Models\Slot;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

use App\Models\SkillLevel;
use App\Http\Requests\StoreCourseRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function addCourse()
    {
        $categories = Category::all();
        return view('Courses.course-add',['categories' => $categories]);
    }

    public function viewCourse()
    {
        $courses = Course::withCount(['author','category'])->get();
        return view('Courses.course-view',['courses' => $courses]);
    }
    public function overview_course($id)
    {
      //$course = Course::where('slug',$id)->first();
      DB::beginTransaction();
         try{
      $course = Course::withCount(['author','category'])->where('slug',$id)->first();
      $modules = Module::with(['sections'])->where('course_id',$course->id)->get();
      $slots = Slot::where('course_id',$course->id)->get();
      $languages = Language::all();
      $skill_levels = SkillLevel::all();
DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
      return view('Courses.course_overview',['languages'=>$languages,'skill_levels'=>$skill_levels,'course'=>$course,'modules'=>$modules,'slots'=>$slots]);
    }

    public function storeCourse(StoreCourseRequest $request)
    {
      DB::beginTransaction();
         try{
      $expanse = Course::where('category_id',$request->category_id)->where('name', $request->name)->first();
      if ($expanse) {
          return back()->with('error', 'Course Already Available');
      }
        $course = new Course;
        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->slug = SlugService::createSlug(Course::class, 'slug', $request->name);
        $course->description = $request->description;
        $course->author_id = $request->author_id;
        $course->save();
DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
        return redirect(route('view-course'))->with('message', 'Course Added Successfully');
    }

    public function deleteCourse(Request $request){
         $course = Course::find($request->id);
         $course->delete();

         return back()->with('message', 'Course Deleted Successfully');
    }
    public function editCourse($id){
      $categories = Category::all();
      $course = Course::find($id);
         return view('Courses.edit',['course' => $course,'categories'=>$categories]);
    }
    public function updateCourse(Request $request){
      DB::beginTransaction();
         try{
      $course = Course::find($request->id);
      $course->name = $request->name;
      $course->category_id = $request->category_id;
      $course->description = $request->description;
      $course->save();
      DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
      return redirect(route('view-course'))->with('message', 'Course Updated Successfully');
    }
}
