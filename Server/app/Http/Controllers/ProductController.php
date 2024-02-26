<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {

        return view('product.index_product');
    }
    public function showall($id = null)
    {
        $product = Category::find($id)->products->where('status', Product::STATUS['actice']);
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

        $size = Product::size[(array_search($request->size, Product::size))];
        $product = Product::find($request->ID);
        $total = $product[$size] * $request->quantity;

        return view('product.add_cart', compact('product', 'total'));
    }
    public function youcart(Request $request)
    {

        $list_order = Order::where([
            'user_id' => auth()->user()->id,
            'status' => Order::Status['cart'],
        ])->get();
        $subtotal = Order::sum('total');
        return view('product.you_cart', compact('list_order', 'subtotal'));
    }
    public function storeOrder(Request $request)
    {
        $product = Product::find($request->ID);
        $size = Product::size[$request->size];
        // $id_product = array_column($list_order->toArray(), 'product_id');
        // $list_product = Product::whereIn('id', $id_product)->get();
        // dd($list_product->toArray());

        DB::beginTransaction();
        try {
            Order::create([
                'product_id' => $request->ID,
                'quantity' => $request->quantity,
                'create_day' => now(),
                'bill_id' => null,
                'total' => $product[$request->size] * $request->quantity,
                'status' => Order::Status['cart'],
                'user_id' => auth()->user()->id,
                'size' => Product::size[$request->size]

            ]);
            DB::commit();
            $order = Order::count();
            Session::put('quantity', $order);
            return back()->with('add_cart_success', 'success');
        } catch (\Throwable $error) {
            dd($error);
            DB::rollBack();
            return back()->with('error_add_cart', 'error');
        }
    }
    public function updateCart(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($request->ID);
            $price = $order->total / $order->quantity;
            $order->quantity = $request->quantity;
            $order->total = $request->quantity * $price;
            $order->save();
            DB::commit();
            return back()->with('success', 'Update success');
        } catch (\Throwable $error) {
            DB::rollBack();
            return back()->with('error', 'Upadate error');
        }
    }
    public function removeCart(Request $request)
    {
        try {
            Order::destroy($request->ID);
            return back()->with('delete_success', 'Remove success');
        } catch (\Throwable $error) {
            return back()->with('delete_error', 'Revome faild');
        }
    }
}
