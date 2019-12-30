<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct() {

        $categories = Category::with('subcategories')->get();

        View::share('categories', $categories);
    }

    public function index() {
        
        $on_sale_products = Product::whereNotNull('sale_price')->get();

        $new_products = Product::where('new', 1)->get();
        
        return view('index', compact('on_sale_products', 'new_products'));
    }


    public function category(Category $category, Subcategory $subcategory = null) {

        $filter = request('s');
        $selected_size = 'all';
        $products_per_page = $filter['products_per_page'] ?? 24;

        if($subcategory) {
            $products = $subcategory->products();
            $title = $subcategory->name;
            $desc = $subcategory->desc;
        } else {
            $products = $category->products();
            $title = $category->name;
            $desc = $category->desc;
        }
        
        if(isset($filter['price'])) {
            $products->where('price', '>', $filter['price']['min'])->where('price', '<', $filter['price']['max']);
        }

        if(isset($filter['size']) && $filter['size'] != 'all') {
            $products->where('size', $filter['size']);
            $selected_size = $filter['size'];
        }

        if(isset($filter['sort_by'])) {
            $products->orderByRaw($filter['sort_by']);
        }

        $products = $products->paginate($products_per_page);

        $sizes = Product::distinct('size')->get()->pluck('size');
        
        return view('category', compact('category', 'subcategory', 'products', 'sizes', 'selected_size', 'title', 'desc'));
    }

    public function product($slug) {

        $product = Product::where('slug', $slug)->with('category', 'subcategory', 'attributes')->firstOrFail();

        return view('product', compact('product'));
    }

    public function contacts() {

        return view('contacts');
    }
}
