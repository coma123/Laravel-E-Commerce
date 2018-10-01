<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontendController extends Controller
{
    public function index(){
        return view('index', ['products' => Product::paginate(3)]);
    }

    public function single($id){
        return view('single', ['product' => Product::find($id)]);
    }
}
