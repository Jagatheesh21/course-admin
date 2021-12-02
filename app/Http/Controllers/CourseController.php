<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Module;
use App\Models\Slot;
use App\Models\Language;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Helper\Files;
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
        $languages = Language::all();
        $skill_levels = SkillLevel::all();
        return view('Courses.course-add',['categories' => $categories,'languages' => $languages,'skill_levels'=>$skill_levels]);
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
      $students = Enrollment::where('course_id',$course->id)->get();
DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
      return view('Courses.course_overview',['languages'=>$languages,'skill_levels'=>$skill_levels,'course'=>$course,'modules'=>$modules,'slots'=>$slots,'students'=>$students]);
    }

    public function storeCourse(Request $request)
    {
      //dd($request->all());
      $file = $request->file;
      // DB::beginTransaction();
      //    try{
      $expanse = Course::where('category_id',$request->category_id)->where('name', $request->name)->first();
      if ($expanse) {
          return back()->with('error', 'Course Already Available');
      }

      $path = public_path("courses");
      if(!is_dir($path)) {

        mkdir($path, 0755, true);
      }
        if($file)
        {
          $fileName = $file->getClientOriginalName();
          $file->move($path, $fileName);
                     
        }
        $course = new Course;
        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->slug = SlugService::createSlug(Course::class, 'slug', $request->name);
        $course->description = $request->description;
        $course->author_id = $request->author_id;
        $course->tags = $request->tags;
        $course->skill_level_id = $request->skill_level_id;
        $course->language_id = $request->language_id;
        $course->tags = $request->tags;
        $course->course_picture = 'courses/'.$fileName;
        $course->save();
      //   DB::commit();
      // }catch (\Exception $e) {
      //             //Rollback Transaction
      //           DB::rollback();
      //           return back()->with('message',$e);
      //       }
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
      $file = $request->file;
      $path = public_path("courses");
      if(!is_dir($path)) {

        mkdir($path, 0755, true);
      }
        if($file)
        {
          $fileName = $file->getClientOriginalName();
          $file->move($path, $fileName);
        }
      DB::beginTransaction();
         try{
      $course = Course::find($request->id);
      $course->name = $request->name;
      $course->category_id = $request->category_id;
      $course->description = $request->description;
      $course->tags = $request->tags;
      $course->course_picture = $fileName;
      $course->skill_level_id = $request->skill_level_id;
      $course->language_id = $request->language_id;
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
