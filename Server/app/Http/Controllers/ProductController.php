<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return view('product.index_product');
    }
    public function showall($id = null)
    {
        dd(Product::where('category_id', $id)->get()->toArray());
    }
}
