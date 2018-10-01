<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('products.index', ['products' => Product::all()]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $product = new Product;

        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;

        $product_image = request()->image;

        $product_image_new_name = time().$product_image->getClientOriginalName();

        $product_image->move('uploads/products/', $product_image_new_name);

        $product->image = 'uploads/products/'.$product_image_new_name;

        $product->save();

        Session::flash('success', 'Product Added');

        return redirect()->route('products.index');
    }

    public function edit($id){
        return view('products.edit', ['product' => Product::find($id)]);
    }

    public function update($id){
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);

        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;

        if(request()->hasFile('image')){
            $product_image = request()->image;

            $product_image_new_name = time().$product_image->getClientOriginalName();

            $product_image->move('uploads/products', $product_image_new_name);

            $product->image = 'uploads/products'.$product_image_new_name;
        }

        $product->save();

        Session::flash('success', 'Product Updated');

        return redirect()->route('products.index');
    }

    public function destroy($id){
        $product = Product::find($id);

        if(file_exists($product->image)){
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'Product Deleted');

        return redirect()->back();
    }
}
