@extends('layout.app')
@include('layout.header')
@php
use App\Config\UrlBase;
use App\Models\Product;
use App\Models\Order;
@endphp
<h1 style="text-align: center">Danh sách đơn hàng</h1>
@if(empty($list_bill))
@else
@foreach($list_bill as $item)
<div class="container mt-5">

    <div class="d-flex flex-column flex-wrap-reverse">
        <h3>THÔNG TIN ĐƠN HÀNG</h3>
        <p>Mã đơn hàng của bạn: {{$item->ID}}</p>
        <p>Ngày đặt: {{date('d-m-Y ', strtotime($item->createDay))}}</p>
        <p>Phương thức thanh toán: {{$item->payment==1?"Thanh toán khi nhận hàng (COD)":"Thanh toán online"}}</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SẢN PHẨM</th>
                    <th scope="col">HÌNH ẢNH</th>
                    <th scope="col">ĐƠN GIÁ</th>
                    <th scope="col">SỐ LƯỢNG</th>
                    <th scope="col">THÀNH TIỀN</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Order::where(['bill_id'=>$item->ID])->get() as $item1)
                <tr style="width: 100%;">
                    <td style="word-break:break-all;">{{Product::find($item1->product_id)->name}}</td>
                    <td style="word-break:break-all;"><img
                            src="{{asset(UrlBase::getImageProduct(Product::find($item1->product_id)->image))}}"
                            class="img-fluid" alt="" srcset="" style="width: 150; height: 100px;"></td>
                    <td style="word-break:break-all;">{{number_format($item1->total/$item1->quantity,0,'',',')}}₫</td>
                    <td style="word-break:break-all;">{{number_format($item1->quantity,0,'',',')}}</td>
                    <td style="word-break:break-all;">{{number_format($item1->total,0,'',',')}}₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <strong>PHÍ VẬN CHUYỂN:{{number_format($item->money_ship,0,'',',')}} đ</strong>
        <strong>TỔNG THÀNH TOÁN: {{number_format($item->total+$item->money_ship,0,'',',')}}đ</strong>
        </form>
        <hr>
    </div>
</div>
@endforeach

@endif