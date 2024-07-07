<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $latestproducts = Product::latest()->limit(3)->get();
        return view('welcome', compact('latestproducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function categoryproducts($catid)
    {
        $category = Category::find($catid);
        $products = Product::where('category_id', $catid)->paginate(3);
        return view('categoryproducts', compact('products', 'category'));
    }

    public function viewproduct($id)
    {
        $product = Product::find($id);
        $relatedproducts = Product::where('category_id',$product->category_id)->where('id','!=',$id)->get();
        return view('viewproduct', compact('product', 'relatedproducts'));
    }

    public function myprofile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('myprofile',compact('orders'));
    }
}
