<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Post;
use App\Models\Room;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $last_posts = Post::latest('updated_at')->limit(3)->get();
        $hero_sections = HeroSection::latest()->take(7)->get();
        $rooms = Room::latest('updated_at')->get();
        $dishes = Dish::latest('updated_at')->limit(15)->get();
        $galleries = Gallery::paginate(15);

        return view('welcome', compact('hero_sections', 'last_posts', 'rooms', 'galleries', 'dishes'));
    }

    public function about()
    {
        $rooms = Room::all();
        $services= Service::all();
        return view('about', compact('rooms','services'));
    }

    public function blog()
    {
        $categories = Category::all();
        $posts = Post::latest('updated_at')->paginate(60);
        return view('blog', compact('posts', 'categories'));
    }

    public function blogByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $posts = Post::where('category_id', $category->id)->paginate(60);
        return view('blog', compact('posts', 'categories'));
    }

    public function blogArticle($category, $slug)
    {
        $last_posts = Post::latest('updated_at')->limit(6)->get();
        $article = Post::where('slug', $slug)->firstOrFail();
        return view('article', compact('article', 'last_posts'));
    }

    public function blogSearch(Request $request)
    {
        $categories = Category::all();
        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')->paginate(60);
        return view('blog', compact('posts', 'categories'));
    }

    public function rooms()
    {
        $rooms2 = Room::orderBy('updated_at', 'desc')->paginate(60);
        return view('rooms', compact('rooms2'));
    }

    public function services()
    {
        return view('services');
    }

    public function dishes()
    {
        $dishes = Dish::paginate(60);
        return view('dishes', compact('dishes'));
    }

    public function dishDetail(Dish $dish)
    {
        return view('dish-detail', compact('dish'));
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        Newsletter::create(['email' => $request->email]);

        return back();
    }
}
