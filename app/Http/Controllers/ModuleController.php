<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Models\ModuleSection;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;


class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addModule(Request $request)
    {
        $course = Course::find($request->id);
        $id = $course->id;
        $name = $course->c_name;
        $module = Module::with('sections')->where('course_id',$request->id)->get();
        //dd($module);
        return view('Module.add-module',['id' => $id,'name' => $name,'modules' => $module]);

    }

    public function storeModule(Request $request)
    {
        //dd($request->all());
      DB::beginTransaction();
         try{
        $module = Module::where('name',$request->name)->get()->count();
        if ($module>0) {
            return back()->with('error', 'Module Already Available');
        }
        $module = new Module;
        $module->category_id = $request->category_id;
        $module->course_id = $request->course_id;
        $module->name = $request->name;
        $module->slug = SlugService::createSlug(Course::class, 'slug', $request->name);
        $module->description = $request->description;
        $module->status = 1;
        $module->save();
        DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
        return back()->with('message', 'Module Added Successfully');
    }

    public function viewModule(Request $request)
    {
      $module = Module::with('sections')->where('course_id',$request->id)->get();

        $course = Course::find($request->id);
        $id = $course->id;
        $name = $course->c_name;


      return view('Module.view-module',['modules' => $module,'id' => $id,'name' => $name]);
    }

    public function deleteModule(Request $request)
    {
        DB::beginTransaction();
         try{
        Module::destroy($request->id);
        DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }

         return back()->with('message', 'Module Deleted Successfully');

    }
    public function editModule($id)
    {
      $module = Module::find($id);
      return $module;
    }
    public function updateModule(Request $request)
    {
      DB::beginTransaction();
         try{
      $module = Module::where('name',$request->name)->get()->count();
      if ($module>0) {
          return back()->with('error', 'Module Already Available');
      }
      $module = Module::find($request->id);
      $module->category_id = $request->category_id;
      $module->course_id = $request->course_id;
      $module->slug = SlugService::createSlug(Course::class, 'slug', $request->name);
      $module->name = $request->name;
      $module->description = $request->description;
      $module->status = 1;
      $module->save();
       DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
      return back()->with('message', 'Module Updated Successfully');


    }

}
