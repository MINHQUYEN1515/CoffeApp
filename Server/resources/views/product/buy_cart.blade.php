@extends('layout.app')
@include('layout.header')
@php
use App\Config\UrlBase;
use App\Models\Category;
use App\Models\Product;
@endphp
<style>
    * {
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow:
            rgba(0, 0, 0, .01) 0 0 1px
    }

    body {
        font-family: 'Rubik', sans-serif;
        font-size: 14px;
        font-weight: 400;
        background:
            #E0E0E0;
        color: #000000
    }

    ul {
        list-style: none;
        margin-bottom: 0px
    }

    .button {
        display: inline-block;
        background:
            #0e8ce4;
        border-radius: 5px;
        height: 48px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .button a {
        display:
            block;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right:
            35px
    }

    .button:hover {
        opacity: 0.8
    }

    .cart_section {
        width: 100%;
        padding-top: 93px;
        padding-bottom: 111px
    }

    .cart_title {
        font-size:
            30px;
        font-weight: 500
    }

    .cart_items {
        margin-top: 8px
    }

    .cart_list {
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff
    }

    .cart_item {
        width: 100%;
        padding: 15px;
        padding-right: 46px
    }

    .cart_item_image {
        width:
            133px;
        height: 133px;
        float: left
    }

    .cart_item_image img {
        max-width: 100%
    }

    .cart_item_info {
        width: calc(100% - 133px);
        float:
            left;
        padding-top: 18px
    }

    .cart_item_name {
        margin-left: 7.53%
    }

    .cart_item_title {
        font-size: 14px;
        font-weight: 400;
        color:
            rgba(0, 0, 0, 0.5)
    }

    .cart_item_text {
        font-size: 18px;
        margin-top: 35px
    }

    .cart_item_text span {
        display: inline-block;
        width:
            20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 11px;
        -webkit-transform: translateY(4px);
        -moz-transform:
            translateY(4px);
        -ms-transform: translateY(4px);
        -o-transform: translateY(4px);
        transform:
            translateY(4px)
    }

    .cart_item_price {
        text-align: right
    }

    .cart_item_total {
        text-align: right
    }

    .order_total {
        width: 100%;
        height:
            60px;
        margin-top: 30px;
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        padding-right:
            46px;
        padding-left: 15px;
        background-color: #fff
    }

    .order_total_title {
        display: inline-block;
        font-size: 14px;
        color:
            rgba(0, 0, 0, 0.5);
        line-height: 60px
    }

    .order_total_amount {
        display: inline-block;
        font-size: 18px;
        font-weight:
            500;
        margin-left: 26px;
        line-height: 60px
    }

    .cart_buttons {
        margin-top: 60px;
        text-align: right
    }

    .cart_button_clear {
        display:
            inline-block;
        border: none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: rgba(0, 0, 0, 0.5);
        background:
            #FFFFFF;
        border: solid 1px #b2b2b2;
        padding-left: 35px;
        padding-right: 35px;
        outline: none;
        cursor: pointer;
        margin-right:
            26px
    }

    .cart_button_clear:hover {
        border-color: #0e8ce4;
        color: #0e8ce4
    }

    .cart_button_checkout {
        display: inline-block;
        border:
            none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px;
        outline:
            none;
        cursor: pointer;
        vertical-align: top
    }
</style>
<div class="d-flex">
    <div class="cart_section p-2 w-75 bd-highlight">
        <div class="d-flex justify-content-center">

            <div class="d-flex flex-column " style="width: 70%;">
                <form action="{{route('settingAddress')}}" method="get">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="d-flex justify-content-between align-items-center"
                        style="background-color: #fafafa;height: 50px;">
                        <div style="padding-left: 10px">@lang('mutilanguage.shipping_address')</div>
                        <div style="padding-right: 10px"><button type="submit"
                                class="btn btn-primary">@lang('mutilanguage.edit')</button>
                        </div>
                    </div>
                </form>
                <div class="d-flex">
                    <div class="d-flex justify-content-start align-items-center">
                        <div style="flex: 2; padding-left: 10px">UserName:</div>
                        <div><strong>{{$user->username}}</strong></div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex justify-content-start align-items-center">
                        <div style="flex: 2;padding-left: 10px">@lang('mutilanguage.shipping_address'):</div>
                        <div>
                            <strong>{{$user->address_shipping}}</strong>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">@lang('mutilanguage.you_cart')<small> ({{count($order)}}
                                @lang('mutilanguage.product')) </small>
                        </div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @if(empty($order))
                                @else
                                @foreach($order as $item)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="{{asset(UrlBase::getImageProduct(Product::find($item->product_id)->image))}}"
                                            alt="">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">@lang('mutilanguage.name')
                                            </div>
                                            <div class="cart_item_text">{{Product::find($item->product_id)->name}}
                                            </div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">@lang('mutilanguage.quantity')</div>
                                            <div class="cart_item_text">{{$item->quantity}}</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">@lang('mutilanguage.price')</div>
                                            <div class="cart_item_text">
                                                {{number_format($item->total/$item->quantity,0,'',',')}}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">@lang('mutilanguage.total')</div>
                                            <div class="cart_item_text">{{number_format($item->total,0,'',',')}}
                                            </div>
                                        </div>
                                        <div class=" d-flex flex-column align-items-end justify-content-evenly"
                                            style="height: 132px">
                                            <a href="{{route('removeBuyToCart',['id'=>$item->ID])}}"
                                                class="btn btn btn-danger active"
                                                aria-pressed="true">@lang('mutilanguage.remove')</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">@lang('mutilanguage.order_total')</div>
                                <div class="order_total_amount total_order">{{number_format($order_sum,0,'',',')}}
                                    VND</div>
                            </div>
                        </div>
                        <div class="cart_buttons">
                            <a href="{{route('index')}}" class="button cart_button_clear"
                                style="text-decoration: none">@lang('mutilanguage.continue_shop')</a> <a
                                href="{{route('order'),['list_id'=>]}}" type="button"
                                class="button cart_button_checkout"
                                style="text-decoration: none">@lang('mutilanguage.add_to_cart')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-2 flex-shrink-2 bd-highlight" style="width: 23%; height: 30%;">
        <div class="container">
            <main>
                <div>
                    <form action="{{route('buyToCart')}}" method="post">
                        {{csrf_field()}}
                        <div class="col-md-5 col-lg-4 order-md-last" style="width: 100%;">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">@lang('mutilanguage.you_cart')</span>
                                <span class="badge bg-primary rounded-pill">{{count($cart_order)}}</span>
                            </h4>

                            <ul class="list-group mb-3">
                                @if(empty($cart_order))
                                @else
                                @foreach ($cart_order as $item)
                                <li class="list-group-item d-flex justify-content-between lh-sm cart">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$item->ID}}"
                                            id="flexCheckChecked" name="order_process[]">
                                    </div>
                                    <div>
                                        <h6 class="my-0">{{Product::find($item->product_id)->name}}</h6>
                                        <small
                                            class="text-muted">{{Product::find($item->product_id)->description}}</small>
                                    </div>
                                    <span class="text-muted fw-bold">{{number_format($item->total,0,'',',')}}VND</span>
                                </li>
                                <div style="height: 10px"></div>
                                @endforeach
                                @endif
                            </ul>
                            <div class="d-flex justify-content-center" style="margin-bottom: 10px">
                                <button type="submit" class="btn btn-primary">@lang('mutilanguage.buy_more')</button>
                            </div>
                    </form>
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
        </div>
        </main>
    </div>

</div>
</div>
<script>


</script>