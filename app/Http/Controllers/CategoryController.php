<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;




class CategoryController extends Controller
{

    public function __construct()
    {

    }


    public function view(){

        $categories = Category::all();
        return view('Category.list-category',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        //dd($request->all());


        DB::beginTransaction();
         try{
        $expanse = Category::where('cat_name', $request->category)->first();
        if ($expanse) {
            return back()->with('error', 'Category Already Available');
        }
        $unique_priority = Category::where('priority',$request->priority)->first();
        if($unique_priority)
        {
          return back()->with('error','Priority Value Already Taken');
        }
        $cat = new Category;
        $cat->cat_name = $request->category;
        $cat->priority = $request->priority;
        $cat->slug = SlugService::createSlug(Category::class, 'slug', $request->category);
        $cat->save();
        DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
        return back()->with('message', 'Category Added Successfully');
    }

    public function deleteCategory(Request $request)
    {
        DB::beginTransaction();
         try{
        $category = Category::find($request->id);
        $category->delete();
        DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }
        return back()->with('message', 'Category Deleted Successfully');
    }
    public function editCategory($id)
    {
      return $category = Category::find($id);
    }
    public function update(Request $request)
    {
      DB::beginTransaction();
         try{
      $expanse = Category::where('cat_name', $request->category)->first();
      if ($expanse) {
          return back()->with('error', 'Category Already Available');
      }
      $cat = Category::find($request->category_id);
      $cat->cat_name = $request->category;
      $cat->slug = SlugService::createSlug(Category::class, 'slug', $request->category);
      $cat->save();
      DB::commit();
      }catch (\Exception $e) {
                  //Rollback Transaction
                DB::rollback();
                return back()->with('message',$e);
            }

      return back()->with('message', 'Category Updated Successfully');
    }
}
