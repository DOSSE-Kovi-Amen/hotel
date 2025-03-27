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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\InscriptionController;

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
    // Display three last posts
    $last_posts = Post::limit(3)->orderBy('updated_at', "desc")->get();
    $hero_sections = HeroSection::latest()->take(7)->get();
    $rooms = Room::orderBy('updated_at', 'desc')->get();
    $dishes = Dish::limit(15)->orderBy('updated_at', "desc")->get();
    $galleries = Gallery::paginate(15);

    return view('welcome', compact('hero_sections', 'last_posts', 'rooms', 'galleries', 'dishes'));
});

Route::get('about', function () {
    return view('about');
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('blog', function () {
    $categories = Category::all();
    $posts = Post::orderBy('updated_at', 'desc')->paginate(60);
    return view('blog', compact('posts', 'categories'));
});

Route::get('blog/category/{slug}', function ($slug) {
    $category = Category::where('slug', '=', $slug)->firstOrFail();
    $categories = Category::all();
    $posts = Post::where('category_id', '=', $category->id)
        ->paginate(60);
    return view('blog', compact('posts', 'categories'));
});

Route::get('blog/article/{category}/{slug}', function ($category, $slug) {
    $last_posts = Post::limit(6)->orderBy('updated_at', "desc")->get();
    $article = Post::where('slug', '=', $slug)->firstOrFail();
    return view('article', compact('article', 'last_posts'));
});

Route::get('blog/search', function (Request $request) {
    $categories = Category::all();
    if ($request == null) {
        $posts = Post::all()
            ->paginate(60);
    } else {
        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')
            ->paginate(60);
    }

    return view('blog', compact('posts', 'categories'));
});

Route::get('rooms', function () {
    $rooms = Room::orderBy('updated_at', 'desc')->paginate(60);
    return view('rooms', compact('rooms'));
});

Route::get('services', function () {
    // $rooms = Room::orderBy('updated_at', 'desc')->paginate(60);
    return view('services');
});
Route::post('newsletters', function (Request $request) {
    $request->validate([
        'email' => 'required|email|unique:newsletters', // Utilisez la règle 'email' pour valider le champ email.
        // Autres règles de validation...
    ]);
    Newsletter::create(['email' => $request->email]);
    return back();
});
Route::get('dishes', function (Request $request) {
    $dishes= Dish::paginate(60);
    return view('dishes', compact('dishes'));
})->name('dishes.index');

Route::get('dishes/{dish}', function (Dish $dish) {
    return view('dish-detail', compact('dish'));
})->name('dishes.show');



Route::group(['prefix' => 'admin'], function () {
    // routes for voyager
    Voyager::routes();
});
Route::get('login', function () {
    return redirect('admin/login');
})->name('login');
