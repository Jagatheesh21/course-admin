<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Slot;
use App\Models\Module;
use App\Http\Requests\StoreSlotRequest;
use App\Models\Language;
use App\Models\SkillLevel;
use App\Helper\Reply;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;


class SlotController extends Controller
{
    public function addSlot(Request $request)
    {
        $course = Course::where('id',$request->id)->first();
        $languages = Language::all();
        $skill_levels = SkillLevel::all();
        $slot = Slot::where('course_id',$request->id)->get();
        return view('Slots.add-slot',['course' => $course,'slots' => $slot,'languages'=>$languages,'skill_levels'=>$skill_levels]);
    }

    public function storeSlot(Request $request)
    {
          //dd($request->all());
         //  DB::beginTransaction();
         // try{
         $slot = new Slot;
         $slot->category_id = $request->category_id;
         $slot->course_id = $request->course_id;
         $slot->name = $request->name;
         $slot->slug = SlugService::createSlug(Slot::class, 'slug', $request->name);
         $slot->descrpition = $request->description;
         $slot->start_date = date('Y-m-d', strtotime($request->start));
         $slot->end_date = date('Y-m-d', strtotime($request->end));
         $slot->seats = $request->seats;
         $slot->price = round($request->price,2);
         $slot->status = 1;
         $slot->save();
      //    DB::commit();
      // }catch (\Exception $e) {
      //             //Rollback Transaction
      //           DB::rollback();
      //           return back()->with('message',$e);
      //       }
         return back()->with('message', 'Slot Added Successfully');
    }
    public function editSlot($id)
  {
  $slot = Slot::find($id);
  $languages = Language::all();
  $skill_levels = SkillLevel::all();

  $modules = Module::where('category_id',$slot->category_id)->get();

  $view = view('Slots.edit_slot',['slot'=>$slot,'modules'=>$modules,'languages'=>$languages,'skill_levels'=>$skill_levels])->render();
  return Reply::dataOnly(['html'=>$view]);
  }

  public function updateSlot(Request $request)
  {
DB::beginTransaction();
         try{
    $slot = Slot::find($request->id);
    $slot->category_id = $request->category_id;
    $slot->course_id = $request->course_id;
    $slot->name = $request->name;
    $slot->slug = SlugService::createSlug(Slot::class, 'slug', $request->name);
    $slot->descrpition = $request->description;
    $slot->start_date = date('Y-m-d', strtotime($request->start));
    $slot->end_date = date('Y-m-d', strtotime($request->end));
    $slot->seats = $request->seats;
    $slot->price = round($request->price,2);
    $slot->status = 1;
    $slot->save();
DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
    return back()->with('message', 'Slot Updated Successfully');

  }
  public function deleteSlot(Request $request)
  {
      DB::beginTransaction();
         try{
      Slot::destroy($request->id);
      DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
       return back()->with('message', 'Slot Deleted Successfully');

  }
}
