<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SubcategoryController;

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

// All Listings

Route::get('/', [ListingController::class, 'index'])->name('/');

Route::get('/address', [AddressController::class, 'index'])->name('showaddress');

Route::get('/user', [ListingController::class, 'user'])->name('/user');

//Route::post('/', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

// Registered admin view

Route::get('/dashboard', [ListingController::class, 'admin'])->middleware(['auth', 'admin'])->name('dashboard');

//Show create form

Route::get('/listings/admin/create', [ListingController::class, 'create'])->middleware(['auth', 'admin'])->name('create_listing');;

Route::get('/listings/user/create', [ListingController::class, 'create'])->middleware(['auth', 'user'])->name('create_listing');;

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);


Route::get('/listings/admin/{listing}', [ListingController::class, 'show_admin']);

Route::get('/listings/user/{listing}', [ListingController::class, 'show_user']);

//Store Listing data

Route::post('/listings', [ListingController::class, 'store'])->middleware(['auth', 'admin'])->name('store_listing');;


Route::post('/reviews', [ReviewsController::class, 'store'])->middleware(['auth', 'admin'])->name('store_review');;


//Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware(['auth', 'admin'])->name('edit_listing');;

// Update listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware(['auth', 'admin'])->name('update_listing');;

// Delete listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware(['auth', 'admin'])->name('delete_listing');;

// Show Register/Create Form

Route::get('/register', [UserController::class, 'create']);

// Register User

Route::post('/users', [UserController::class, 'store']);

// Log user out

Route::post('/logout', [UserController::class, 'logout']);

//Show login form

Route::get('/login', [UserController::class, 'login'])->name('login');

//Login User

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/showusers/admin', [UserController::class, 'admin'])->middleware(['auth', 'admin'])->name('show_users_admin');;

Route::get('/showusers/user', [UserController::class, 'user_index'])->middleware(['auth', 'user'])->name('show_users_user');;

Route::get('/showusers/guest', [UserController::class, 'guest_index'])->name('show_users_guest');;

Route::put('/users/{user}', [UserController::class, 'update'])->middleware(['auth', 'admin'])->name('update_user');;

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware(['auth', 'admin'])->name('edit_user');;

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'admin'])->name('delete_user');;


// Send Email
Route::get('/email',[MailController::class, 'sendMail']);

Route::post('/comment/store', [CommentController::class, 'store'])->middleware(['auth', 'admin'])->name('comment.add');

Route::get('/address/{id}', [AddressController::class, 'addressByProvince']);


//Service
Route::get('/services', [ServiceController::class, 'index']);

//Category

Route::get('/subcategories/{id}', [SubcategoryController::class, 'subcategoryByCategory']);




