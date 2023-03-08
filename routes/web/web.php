<?php
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChefsController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\StatsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\BookTableController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\WhyChooseYummyController;
use App\Http\Controllers\Admin\ShowBookedTableController;

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

Route::get('/', [HomeController::class,'index']);
Route::post('/', [HomeController::class,'store']);

//Stats
Route::get('/dashboard/stats', [StatsController::class,'index']);

// Cover
Route::get('/dashboard/cover', [CoverController::class,'index']);
Route::put('/dashboard/cover', [CoverController::class,'update']);

//About
Route::get('/dashboard/about', [AboutController::class,'index']);
Route::put('/dashboard/about', [AboutController::class,'update']);

//why choose yummy
Route::get('/dashboard/why_choose_yummy', [WhyChooseYummyController::class,'index']);
Route::put('/dashboard/why_choose_yummy', [WhyChooseYummyController::class,'update']);


//Testimonials
Route::get('/dashboard/testimonials', [TestimonialController::class,'index']);
Route::post('/dashboard/testimonials', [TestimonialController::class,'store']);
Route::get('/dashboard/testimonials/edit-testimonials/{id}', [TestimonialController::class,'edit']);
Route::put('/dashboard/testimonials/edit-testimonials/{id}', [TestimonialController::class,'update']);
Route::delete('/dashboard/testimonials/{id}', [TestimonialController::class,'delete']);


//Gallery
Route::get('/dashboard/gallery', [GalleryController::class,'index']);
Route::post('/dashboard/gallery', [GalleryController::class,'store']);
Route::delete("/dashboard/gallery/{id}", [GalleryController::class,'delete']);


//Events
Route::get('/dashboard/events', [EventsController::class,'index']);
Route::post('/dashboard/events', [EventsController::class,'store']);
Route::get('/dashboard/events/edit-events/{id}', [EventsController::class,'edit']);
Route::put('/dashboard/events/edit-events/{id}', [EventsController::class,'update']);
Route::delete('/dashboard/events/{id}', [EventsController::class,'delete']);


//Chefs
Route::get('/dashboard/chefs', [ChefsController::class,'index']);
Route::get('/dashboard/chefs', [ChefsController::class,'index']);
Route::post('/dashboard/chefs', [ChefsController::class,'store']);
Route::get('/dashboard/chefs/edit-chefs/{id}', [ChefsController::class,'edit']);
Route::put('/dashboard/chefs/edit-chefs/{id}', [ChefsController::class,'update']);
Route::delete('/dashboard/chefs/{id}', [ChefsController::class,'delete']);


//Menu Category
Route::get('/dashboard/menuCategory', [MenuCategoryController::class,'index']);
Route::post('/dashboard/menuCategory', [MenuCategoryController::class,'store']);
Route::get('/dashboard/menuCategory/edit-menuCategory/{id}', [MenuCategoryController::class,'edit']);
Route::put('/dashboard/menuCategory/edit-menuCategory/{id}', [MenuCategoryController::class,'update']);
Route::delete('/dashboard/menuCategory/{id}', [MenuCategoryController::class,'delete']);


//Menu Items
Route::get('/dashboard/menuItem', [MenuItemController::class,'index']);
Route::post('/dashboard/menuItem', [MenuItemController::class,'store']);
Route::get('/dashboard/menuItem/edit-menuItem/{id}', [MenuItemController::class,'edit']);
Route::put('/dashboard/menuItem/edit-menuItem/{id}', [MenuItemController::class,'update']);
Route::delete('/dashboard/menuItem/{id}', [MenuItemController::class,'delete']);

//Book Table
Route::get('/dashboard/bookTable', [BookTableController::class,'index']);
Route::post('/dashboard/bookTable', [BookTableController::class,'store']);
Route::get('/dashboard/showBookedTable', [ShowBookedTableController::class,'index']);
Route::get('/dashboard/editBookedTable/{id}', [ShowBookedTableController::class,'edit']);
Route::put('/dashboard/editBookedTable/{id}', [ShowBookedTableController::class,'update']);
Route::delete('/dashboard/showBookedTable/{id}', [ShowBookedTableController::class,'delete']);


//contact
Route::get('/dashboard/contact', [ContactController::class,'index']);
Route::put('/dashboard/contact', [ContactController::class,'update']);
//message
Route::get('/dashboard/message', [MessageController::class,'index']);
Route::delete('/dashboard/message/{id}', [MessageController::class,'delete']);
Route::post('/dashboard/message', [MessageController::class,'store']);


/* Route::get('/dashboard/send', function(){
    Mail::to('abdelrahman.hussin1@gmail.com')->send(new MessageMail );
    return response('email sent');
}); */

