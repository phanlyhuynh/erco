<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use App\Post;
use App\Product;
use App\Image;
use App\Category;
use App\Slider;
use App\CategoryProduct;
use Illuminate\Http\Request;
use App\DumpProduct;
use App\User;
use App\Cart;
use App\Payment;
use App\Order;



class PageController extends Controller
{
     public function __construct(Request $req)
    {


    }

    public function home()
    {

        return view('home');
    }

    public function home1()
    {

        $categories = Category::withImages();
        //dd($categories);
        // $slider = Slider::with('images')->get();
        // dd($slider);

        return view('home1', compact('categories', 'listCategories'));
    }

    public function showcate($id)
    {
        $subcate = Category::WithImages($id);

        return view('showcate', compact('subcate', 'listCategories', 'categories'));
    }

    public function shop()
    {

        return view('shop-grid');
    }

    public function shoplist()
    {

        return view('shoplist');
    }

    public function blog()
    {

        $posts = Post::paginate(4);

        return view('blog', compact('posts'));
    }

    public function shoppingcart()
    {

        return view('cart');
    }

    public function viewcart()
    {
        return view('viewcart');
    }

    public function addToCart(Request $req)
    {
        $dumpProduct = new Cart();
        try {
            $product = $dumpProduct->where('product_id', $req->addToCart)->firstOrFail();
            $product->soluong += isset($req->soluong) ? $req->soluong : 1;
            $product->save();
        } catch (ModelNotFoundException $e) {
            $dumpProduct->product_id = $req->addToCart;
            $dumpProduct->soluong = isset($req->soluong) ? $req->soluong : 1;
            $dumpProduct->save();
        }

        return back();
    }

    public function delete($id)
    {
        $delcate = Cart::where('product_id',$id)->delete();
        //dd(DumpProduct::where('product_id',$id));
        return back();
    }

    public function search( Request $req)
    {

        $timkiemsanpham = Product::where('name', 'like', "%".$req->search."%" )->with('images')
                            ->orWhere('price', $req->search )
                            ->get();
        foreach ($timkiemsanpham as $product) {
            $product['images'] = $product->images()->value('link');
        }

        return view('search', compact('timkiemsanpham'));
    }

    public function detail(Request $req) {

        $sanpham = Product::where('id', $req->id)->with('images')->get();
        $sanpham1 = Product::where('id', $req->id)->with('images')->first();
        foreach ($sanpham as $product) {
            $product['images'] = $product->images()->value('link');
        }

        $sanphamlienquan = Category::where('id', $req->id)->with('products.images')->get();
         foreach ($sanphamlienquan as $key) {
            foreach ($key->products as $product) {
                    $product['images'] = $product->images()->value('link');
            }
        }

        return view('detail', compact('sanpham', 'sanphamlienquan', 'listCategories','sanpham1'));
    }

    public function postorder(Request $req)
    {


        $payment = new Payment();
        $payment->method = $req->pay;
        $payment->save();

        $order =  new Order();
        $order->user_id  = $req->user_id;
        $order->name = $req->name;
        $order->email = $req->email;
        $order->phone = $req->phone;
        $order->address = $req->address;
        $order->price_shipping = 30000;
        $order->payment_id = $payment->id;
        $order ->save();

        return redirect()->back();

    }

    public function showDetailPost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('show-detail-post', compact('post'));
    }
}
