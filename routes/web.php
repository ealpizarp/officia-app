<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ContactUsFormController;

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
//Route::post('/', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

// Registered admin view

Route::get('/dashboard', [ListingController::class, 'admin'])->middleware(['auth', 'admin'])->name('dashboard');

//Show create form

Route::get('/listings/create', [ListingController::class, 'create'])->middleware(['auth', 'admin'])->name('create_listing');;

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);


Route::get('/listings/admin/{listing}', [ListingController::class, 'show_admin']);

//Store Listing data

Route::post('/listings', [ListingController::class, 'store'])->middleware(['auth', 'admin'])->name('store_listing');;

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

// Send Email
Route::get('/email',[MailController::class, 'sendMail']);

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');



