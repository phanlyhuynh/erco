<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $categories = Category::all();
        $products = Product::where('price','>',0)->inRandomOrder()->get();
        $posts = Post::all();
//        $prod = Product::where('price','>',0)->orderBy('created_at','DESC')->get();
        view()->share('categories',$categories);
        view()->share('products',$products);
        view()->share('posts',$posts);
//        view()->share('prod',$prod);
        return view('frontend.master');
    }

    public function login()
    {
        return view('frontend.login');
    }
}
