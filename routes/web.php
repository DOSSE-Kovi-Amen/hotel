<?php

use App\Models\Post;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Inscription;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
    $rooms = Room::orderBy('updated_at', 'desc')->get();

    return view('welcome', compact('last_posts', 'rooms'));
});

Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});

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

Route::group(['prefix' => 'admin'], function () {
    // routes for voyager
    Voyager::routes();
});
Route::get('login', function(){
    return redirect('admin/login');
})->name('login');
