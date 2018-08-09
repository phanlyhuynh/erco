<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Category;
class CategoryComposer
{
    public $data = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->data['listCategories'] = Category::where('parent_id', 0)->get();
        // foreach ($listCategories as $category) {
        //     $category['subCategories'] = Category::where('parent_id', $category->id)->get();
        // }

    }
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('listCategories', Category::get());
    }
}

