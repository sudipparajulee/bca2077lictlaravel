<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'photopath' => 'required|image',
        ]);

        $photoname = time().'.'.$request->photopath->extension();
        $request->photopath->move(public_path('images/products'), $photoname);
        $data['photopath'] = $photoname;
        Product::create($data);
        return redirect()->route('products.index')->with('success','Product created successfully.');

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('priority')->get();
        return view('products.edit',compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'photopath' => 'image',
        ]);
        $product = Product::find($id);
        $data['photopath'] = $product->photopath;
        if($request->hasFile('photopath')){
            $photoname = time().'.'.$request->photopath->extension();
            $request->photopath->move(public_path('images/products'), $photoname);
            //delete old photo
            File::delete(public_path('images/products/'.$product->photopath));
            // unlink(public_path('images/products/'.$product->photopath));
            $data['photopath'] = $photoname;
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path('images/products/'.$product->photopath));
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }
}
