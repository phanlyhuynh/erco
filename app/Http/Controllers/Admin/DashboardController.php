<?php

namespace App\Http\Controllers\Admin;

use App\DetailOrder;
use App\Order;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_user = User::all()->count();
        $count_order = Order::all()->count();
        $count_post = Post::all()->count();
        $count_product = Product::all()->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();


        return view('admin.dashboard.dashboard', compact('count_order', 'count_user', 'orders', 'count_post', 'count_product'));
    }
}
