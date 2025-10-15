<?php

use App\Models\Dish;
use App\Models\Post;
use App\Models\Room;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\HeroSection;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;

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
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\InscriptionController;

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('about', [IndexController::class, 'about'])->name('about');
Route::get('blog', [IndexController::class, 'blog'])->name('blog');
Route::get('blog/category/{slug}', [IndexController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog/article/{category}/{slug}', [IndexController::class, 'blogArticle'])->name('blog.article');
Route::get('blog/search', [IndexController::class, 'blogSearch'])->name('blog.search');
Route::get('rooms', [IndexController::class, 'rooms'])->name('rooms');
Route::get('services', [IndexController::class, 'services'])->name('services');
Route::get('dishes', [IndexController::class, 'dishes'])->name('dishes.index');
Route::get('dishes/{dish}', [IndexController::class, 'dishDetail'])->name('dishes.show');
Route::post('newsletters', [IndexController::class, 'subscribeNewsletter'])->name('newsletters.store');
Route::post('/booking/send', [BookingController::class, 'send'])->name('booking.send');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::group(['prefix' => 'admin'], function () {
    // routes for voyager
    Voyager::routes();
});
Route::get('login', function () {
    return redirect('admin/login');
})->name('login');
