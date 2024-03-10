<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        try {
            DB::beginTransaction();
            $user_id = auth()->user()->id;
            $payment = auth()->user()->payment;
            $address = auth()->user()->address_shipping;
            $total = Order::where([
                'user_id' => $user_id,
                'status' => Order::Status['process']
            ])->sum('total');
            $bill = Bill::create([
                'total' => $total,
                'status' => Bill::Status['active'],
                'createDay' => now(),
                'user_id' => $user_id,
                'payment' => $payment,
                'address' => $address,
                'money_ship' => 10000
            ]);
            DB::commit();
            Order::where([
                'user_id' => $user_id,
                'status' => Order::Status['process']
            ])->update(['status' => Order::Status["payment"], 'bill_id' => $bill->ID]);
            return back()->with('buySuccess', 'Buy Success');
        } catch (\Throwable $error) {
            DB::rollBack();
            return back()->with('error', $error);
        }
    }
    public function userOrder()
    {
        $user_id = auth()->user()->id;
        $list_bill = Bill::where([
            'user_id' => $user_id
        ])->get();
        return view('cart.order', compact('list_bill'));
    }
}
