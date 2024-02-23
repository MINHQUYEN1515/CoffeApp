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
        $product = Category::find($id)->products;
        return view('product.detail_product', compact('product'));
    }
    public function detail($id)
    {
        $product = Product::find($id);
        $list_product = Product::where('category_id', $product->category_id)->get();
        return view('product.product', compact('product', 'list_product'));
    }
    public function addCart(Request $request)
    {

        return view('product.add_cart');
    }
}
