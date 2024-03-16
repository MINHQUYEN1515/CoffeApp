<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Category;
use App\Models\Product;

use App\Models\Order;
use App\Models\User;
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
    public function settingAddress(Request $request)
    {
        $user_id = auth()->user()->id;

        $list_order = Order::where([
            'user_id' => $user_id,
            'status' => Order::Status['cart'],
        ])->get();
        return view('product.setting_card', compact('list_order'));
    }
    public function updateAddress(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'email|required',
            'address_shipping' => 'required'
        ]);

        try {
            $user = User::find($request->id);
            $user->firstname = $request->first_name;
            $user->lastname = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->address_shipping = $request->address_shipping;
            $user->payment = Product::payment[$request->payment];
            $user->save();
            return back()->with('updateSuccess', 'update user success');
        } catch (\Throwable $error) {
            return back()->with('updateFaild', $error);
        }
    }
    public function youcart(Request $request)
    {
        $user_id = auth()->user()->id;
        $list_order = Order::where([
            'user_id' => $user_id,
            'status' => Order::Status['cart'],
        ])->get();
        $subtotal = Order::where([
            'user_id' => $user_id,
            'status' => Order::Status['cart'],
        ])->sum('total');
        return view('product.you_cart', compact('list_order', 'subtotal'));
    }
    public function storeOrder(Request $request)
    {
        $product = Product::find($request->ID);
        $size = Product::size[$request->size];
        $user_id = auth()->user()->id;

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
                'user_id' => $user_id,
                'size' => $size

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
    public function getPayment()
    {
        $user = auth()->user();
        $order_sum = Order::where([
            'status' => Order::Status['process'],
            'user_id' => $user->id
        ])->sum('total');
        $order  = Order::where([
            'status' => Order::Status['process'],
            'user_id' => $user->id
        ])->get();
        $cart_order = Order::where([
            'status' => Order::Status['cart'],
            'user_id' => $user->id
        ])->get();
        return view('product.buy_cart', compact('order_sum', 'order', 'cart_order', 'user'));
    }
    public function payment(Request $request)
    {
        $product = Product::find($request->ID);
        $user_id = auth()->user()->id;
        $size = Product::size[$request->size];
        $quantity = $request->quantity;
        $order = Order::where([
            'product_id' => $product->ID,
            'user_id' => $user_id,
            'status' => Order::Status['process']
        ])->first();
        if ($order != null) {
            $order->quantity = $quantity;
            $order->total = $product[$request->size] * $request->quantity;
            $order->save();
            return redirect()->route('getPayment');
        } else {
            DB::beginTransaction();
            try {
                Order::create([
                    'product_id' => $request->ID,
                    'quantity' => $request->quantity,
                    'create_day' => now(),
                    'bill_id' => null,
                    'total' => $product[$request->size] * $request->quantity,
                    'status' => Order::Status['process'],
                    'user_id' => $user_id,
                    'size' => $size

                ]);
                DB::commit();
                return redirect()->route('getPayment');
            } catch (\Throwable $error) {
                return back();
            }
        }
    }

    public function buyToCart(Request $request)
    {

        $user_id = auth()->user()->id;
        Order::where('user_id', $user_id)->whereIn('id', $request->order_process)
            ->update(array('status' => Order::Status['process']));
        return redirect()->route('getPayment');
    }
    public function removeBuyToCart(Request $request)
    {
        Order::destroy($request->id);
        return redirect()->route('getPayment');
    }
}
