<?php

use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChefsController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\StatsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\BookTableController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\WhyChooseYummyController;
use App\Http\Controllers\Admin\ConfirmedBookTableController;

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


Route::get('/dashboard', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Home
Route::get('/', [HomeController::class, 'index']);
Route::post('/bookTable', [BookTableController::class, 'storeFromHome']);
Route::post('/message', [MessageController::class, 'store']);



Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', [AdminController::class, 'index']);

    //profile
    Route::get('/dashboard/profile', [ProfileController::class, 'index']);
/*     Route::patch('/dashboard/profile', [ProfileController::class, 'update']);
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy']); */


    //Stats
    Route::get('/dashboard/stats', [StatsController::class, 'index']);
    //contact
    Route::get('/dashboard/contact', [ContactController::class, 'index']);
    Route::put('/dashboard/contact', [ContactController::class, 'update']);
    // Cover
    Route::get('/dashboard/cover', [CoverController::class, 'index']);
    Route::put('/dashboard/cover', [CoverController::class, 'update']);

    //About
    Route::get('/dashboard/about', [AboutController::class, 'index']);
    Route::put('/dashboard/about', [AboutController::class, 'update']);

    //why choose yummy
    Route::get('/dashboard/why_choose_yummy', [WhyChooseYummyController::class, 'index']);
    Route::put('/dashboard/why_choose_yummy', [WhyChooseYummyController::class, 'update']);


    //Testimonials
    Route::get('/dashboard/testimonials', [TestimonialController::class, 'index']);
    Route::post('/dashboard/testimonials', [TestimonialController::class, 'store']);
    Route::get('/dashboard/testimonials/edit-testimonials/{id}', [TestimonialController::class, 'edit']);
    Route::put('/dashboard/testimonials/edit-testimonials/{id}', [TestimonialController::class, 'update']);
    Route::delete('/dashboard/testimonials/{id}', [TestimonialController::class, 'delete']);


    //Gallery
    Route::get('/dashboard/gallery', [GalleryController::class, 'index']);
    Route::post('/dashboard/gallery', [GalleryController::class, 'store']);
    Route::delete("/dashboard/gallery/{id}", [GalleryController::class, 'delete']);


    //Events
    Route::get('/dashboard/events', [EventsController::class, 'index']);
    Route::post('/dashboard/events', [EventsController::class, 'store']);
    Route::get('/dashboard/events/edit-events/{id}', [EventsController::class, 'edit']);
    Route::put('/dashboard/events/edit-events/{id}', [EventsController::class, 'update']);
    Route::delete('/dashboard/events/{id}', [EventsController::class, 'delete']);


    //Chefs
    Route::get('/dashboard/chefs', [ChefsController::class, 'index']);
    Route::post('/dashboard/chefs', [ChefsController::class, 'store']);
    Route::get('/dashboard/chefs/edit-chefs/{id}', [ChefsController::class, 'edit']);
    Route::put('/dashboard/chefs/edit-chefs/{id}', [ChefsController::class, 'update']);
    Route::delete('/dashboard/chefs/{id}', [ChefsController::class, 'delete']);


    //Menu Category
    Route::get('/dashboard/menuCategory', [MenuCategoryController::class, 'index']);
    Route::post('/dashboard/menuCategory', [MenuCategoryController::class, 'store']);
    Route::get('/dashboard/edit-menuCategory/{id}', [MenuCategoryController::class, 'edit']);
    Route::put('/dashboard/edit-menuCategory/{id}', [MenuCategoryController::class, 'update']);
    Route::delete('/dashboard/menuCategory/{id}', [MenuCategoryController::class, 'delete']);


    //Menu Items
    Route::get('/dashboard/menuItem', [MenuItemController::class, 'index']);
    Route::get('/dashboard/addMenuItem', [MenuItemController::class, 'create']);
    Route::post('/dashboard/addMenuItem', [MenuItemController::class, 'store']);
    Route::get('/dashboard/menuItem/edit-menuItem/{id}', [MenuItemController::class, 'edit']);
    Route::put('/dashboard/menuItem/edit-menuItem/{id}', [MenuItemController::class, 'update']);
    Route::delete('/dashboard/menuItem/{id}', [MenuItemController::class, 'delete']);


    //Book Table
    Route::get('/dashboard/bookedTable', [BookTableController::class, 'index']);
    Route::get('/dashboard/notifications', [BookTableController::class, 'readAllNotification']);
    Route::post('/dashboard/bookTable', [BookTableController::class, 'store']);
    Route::get('/dashboard/addBookTable', [BookTableController::class, 'create']);
    Route::get('/dashboard/editBookedTable/{id}', [BookTableController::class, 'edit']);
    Route::put('/dashboard/editBookedTable/{id}', [BookTableController::class, 'update']);
    Route::delete('/dashboard/BookedTable/{id}', [BookTableController::class, 'delete']);

    //Confirm Book Table
    Route::post('/dashboard/confirmedBookTable/{id}', [ConfirmedBookTableController::class, 'store']);
    Route::get('/dashboard/confirmedBookTable', [ConfirmedBookTableController::class, 'index']);
    Route::delete('/dashboard/confirmedBookTable/{id}', [ConfirmedBookTableController::class, 'delete']);
    Route::post('dashboard/{id}', [ConfirmedBookTableController::class, 'confirmFromHome']);

    //mails
    Route::get('/dashboard/message', [MessageController::class, 'index']);
    Route::get('/dashboard/messageDetails/{id}', [MessageController::class, 'show']);
    Route::delete('/dashboard/message/{id}', [MessageController::class, 'delete']);

    //Users
    Route::get('/dashboard/users', [UserController::class, 'index']);
    Route::get('/dashboard/addUser', [UserController::class, 'create']);
    Route::get('/dashboard/editUser/{id}', [UserController::class, 'edit']);
    Route::post('/dashboard/users', [UserController::class, 'store']);
    Route::put('/dashboard/editUser/{id}', [UserController::class, 'update']);
    Route::delete('/dashboard/users/{id}', [UserController::class, 'delete']);
});
require __DIR__ . '/auth.php';
