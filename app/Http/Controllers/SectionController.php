<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleSection;
use App\Models\Module;
use App\Helper\Reply;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function deleteSection(Request $request)
    {
         $module = ModuleSection::find($request->id);
         $module->delete();

         return back()->with('message', 'Section Deleted Successfully');
    }

    public function addSection(Request $request)
    {
       $module = Module::with('sections')->where('slug',$request->slug)->first();
       return view('Section.add-section',['module' => $module]);
    }
    public function editSection($id)
    {
      $modules = Module::all();
       $section = ModuleSection::find($id);

       $view = view('Section.edit-section',['section'=>$section,'modules'=>$modules])->render();
       return Reply::dataOnly(['html' => $view]);
    }

    public function storeSection(Request $request)
    {
        DB::beginTransaction();
         try{
        $module = Module::Find($request->module_id);
       for($i=0;$i<sizeof($request->name);$i++){

            $sec = new ModuleSection;
            $sec->name = $request->name[$i];
            $sec->duration = $request->duration[$i];
            $sec->module_id = $request->module_id;
            $sec->status = 1;
            $sec->save();
        }
         DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
         return redirect(route('overview_course',['id' => $module->course->slug]))->with('message', 'Section Added Successfully');

    }

    public function linkSection(Request $request)
    {
          $sec = ModuleSection::where('id',$request->id)->first();


          return response()->json(['section' => $sec,'status' => 'success']);

    }

    public function storeUrl(Request $request)
    {

       $sec = ModuleSection::firstOrNew(array('id' => $request->section_id));
       $sec->url = $request->link;
       $sec->save();

       return back()->with('message', 'Link Sent Successfully');
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:module_sections|max:255',
        //     'duration' => 'required',
        // ]);
      DB::beginTransaction();
         try{
        $section = ModuleSection::where('name',$request->name)->get()->count();
        if ($section>0) {
            return back()->with('error', 'Section Already Available');
        }
        $sec = ModuleSection::find($request->id);
        $sec->module_id = $request->module_id;
        $sec->name = $request->name;
        $sec->duration = $request->duration;
        $sec->save();
DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
        return back()->with('message', 'Section Updated Successfully');

    }
}
