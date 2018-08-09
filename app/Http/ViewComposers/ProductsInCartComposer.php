<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Cart;
class ProductsInCartComposer
{
    public $data = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('productsInCart', Cart::get());

    }
}

