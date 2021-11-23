<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Courses
Route::get('courses/add-course',[App\Http\Controllers\CourseController::class, 'addCourse'])->name('add-course');
Route::get('courses/view-course',[App\Http\Controllers\CourseController::class, 'viewCourse'])->name('view-course');
Route::post('courses/store-course',[App\Http\Controllers\CourseController::class, 'storeCourse'])->name('store-course');
Route::get('delete-course',[App\Http\Controllers\CourseController::class, 'deleteCourse'])->name('delete-course');
Route::get('edit-course/{id?}',[App\Http\Controllers\CourseController::class, 'editCourse'])->name('edit-course');
Route::post('update-course',[App\Http\Controllers\CourseController::class, 'updateCourse'])->name('update-course');
Route::get('courses/overview_course/{id?}',[App\Http\Controllers\CourseController::class, 'overview_course'])->name('overview_course');

//Categories
Route::get('categories/view-categories',[App\Http\Controllers\CategoryController::class, 'view'])->name('list-categories');
Route::post('store-category',[App\Http\Controllers\CategoryController::class, 'store'])->name('store-category');
Route::get('delete-category',[App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete-category');
Route::get('edit-category/{id?}',[App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('update-category',[App\Http\Controllers\CategoryController::class, 'update'])->name('update-category');

//Module
Route::get('modules/add-module',[App\Http\Controllers\ModuleController::class, 'addModule'])->name('add-module');
Route::post('courses/store-module',[App\Http\Controllers\ModuleController::class, 'storeModule'])->name('store-module');
Route::get('modules/view-module',[App\Http\Controllers\ModuleController::class, 'viewModule'])->name('view-modules');
Route::get('modules/edit-module/{id?}',[App\Http\Controllers\ModuleController::class, 'editModule'])->name('edit-modules');
Route::post('modules/update-module',[App\Http\Controllers\ModuleController::class, 'updateModule'])->name('update-module');
Route::get('delete-module',[App\Http\Controllers\ModuleController::class, 'deleteModule'])->name('delete-module');

//Section
Route::get('delete-section',[App\Http\Controllers\SectionController::class, 'deleteSection'])->name('delete-section');
Route::get('modules/add-section',[App\Http\Controllers\SectionController::class, 'addSection'])->name('add-section');
Route::post('modules/store-section',[App\Http\Controllers\SectionController::class, 'storeSection'])->name('store-section');
Route::get('link-section',[App\Http\Controllers\SectionController::class, 'linkSection']);
Route::post('store-url',[App\Http\Controllers\SectionController::class, 'storeUrl'])->name('store-link');
Route::post('update-section',[App\Http\Controllers\SectionController::class, 'update'])->name('update-section');
Route::get('modules/edit-section/{id?}',[App\Http\Controllers\SectionController::class, 'editSection'])->name('edit-module-section');

//Slot
Route::get('slot/add-slot',[App\Http\Controllers\SlotController::class, 'addSlot'])->name('add-slot');
Route::post('slot/store-slot',[App\Http\Controllers\SlotController::class, 'storeSlot'])->name('store-slot');
Route::get('slot/edit-slot/{id?}',[App\Http\Controllers\SlotController::class, 'editSlot'])->name('edit-slot');
Route::get('delete-slot',[App\Http\Controllers\SlotController::class, 'deleteSlot'])->name('delete-slot');
Route::post('slot/update-slot',[App\Http\Controllers\SlotController::class, 'updateSlot'])->name('update-slot');
