@extends('layout.app')
@php
use App\Config\UrlBase;
use App\Models\Category;
use App\Models\Product;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        .card {
            border: none
        }

        .product {
            background-color: #eee
        }

        .brand {
            font-size:
                13px
        }

        .act-price {
            color: red;
            font-weight: 700
        }

        .dis-price {
            text-decoration: line-through
        }

        .about {
            font-size:
                14px
        }

        .color {
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left:
                0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 2px 9px;
            border: 2px solid #ff0000;
            display:
                inline-block;
            color: #ff0000;
            border-radius: 3px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color:
                #ff0000;
            background-color: #ff0000;
            color: #fff
        }

        .btn-danger {
            background-color: #ff0000 !important;
            border-color: #ff0000 !important
        }

        .btn-danger:hover {
            background-color: #da0606 !important;
            border-color: #da0606 !important
        }

        .btn-danger:focus {
            box-shadow: none
        }

        .cart i {
            margin-right: 10px
        }

        @media (min-width: 576px) {
            .card-group.card-group-scroll {
                overflow-x: auto;
                flex-wrap: nowrap;
            }
        }

        .card-group.card-group-scroll>.card {
            flex-basis: 35%;
        }
    </style>
    @include('layout.header')
    <div class="container mt-5 mb-5">
        <form action="{{route('addCart')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$product->ID}}" name="ID">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image"
                                            src="{{asset(UrlBase::getImageProduct($product->image))}}" width="250" />
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i>
                                            <span class="ml-1">Back</span>
                                        </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3"> <span
                                            class="text-uppercase text-muted brand">{{Category::find($product->category_id)->name}}</span>
                                        <h5 class="text-uppercase">{{$product->name}}</h5>
                                        @if($product->promotion_sale!=0)
                                        <div class="price d-flex flex-row align-items-center "> <span class="act-price"
                                                id="sale">{{number_format($product->price-($product->price*($product->promotion_sale/100)),0,'',',')}}VND</span>
                                            <div style="width: 5px;"></div>
                                            <div class="ml-5"> <small class="dis-price"
                                                    id="price_sale">{{number_format($product->price,0,'',',')}}
                                                    VND</small>
                                                <span class="badge bg-danger ms-2">-{{$product->promotion_sale}}%</span>

                                            </div>
                                        </div>
                                        @else
                                        <div class="price d-flex flex-row align-items-center ">
                                            <div class="ml-5" id='price'> <span
                                                    class="fw-bold">{{number_format($product->price,0,'',',')}}
                                                    VND</span>

                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <p class="about">{{$product->description}}</p>
                                    <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio"
                                                name="size" value="price" checked onclick="chooseSize('S')">
                                            <span>S</span>
                                        </label> <label class="radio">
                                            <input type="radio" name="size" value="price_sizeM"
                                                onclick="chooseSize('M')">
                                            <span>M</span> </label> <label class="radio"> <input type="radio"
                                                name="size" value="price_sizeL" onclick="chooseSize('L')">
                                            <span>L</span>
                                        </label>
                                        <div class="input-group d-flex  align-items-center"
                                            style="width: 120px;margin-top: 10px">
                                            <button id="decrement" type="button" class="btn btn-dark">-</button>
                                            <input type="number" id="input" value="1" readonly name='quantity'
                                                class="text-center" style="text-align: right;
                                                width: 50px;height:38px;margin: auto; border: none;outline: none">
                                            <button id="increment" type="button" class="btn btn-dark ">+</button>
                                        </div>

                                    </div>

                                    <div class="cart mt-4 align-items-center"> <button type="submit"
                                            class="btn btn-danger text-uppercase mr-2 px-4">@lang('mutilanguage.add_to_cart')</button>
                                        <i class="fa fa-heart text-muted"></i> <i
                                            class="fa fa-share-alt text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="fw-bold font-monospace d-flex justify-content-evenly align-items-center"
            style="background-color: #232f3e;color:#fff">
            <span style="font-size: 19px">Danh sách sản phẩm cùng loại</span>
            <nav aria-label="Page navigation example" style="margin-top: 10px">
                <ul class="pagination">
                    <li class="page-item"><button class="page-link" href="#" onclick="previous()">Previous</button></li>
                    <li class="page-item"><button class="page-link" href="#">Next</button></li>
                </ul>
            </nav>
        </div>
        <div class="card-group card-group-scroll">
            @foreach ($list_product as $item)
            <div class="col-lg-4 col-md-12 mb-4 " style="margin-right: 10px">
                <div class="card" style="padding-bottom:10px;">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light d-flex flex-column align-items-center"
                        data-mdb-ripple-color="light">
                        <img src="{{asset(UrlBase::getImageProduct($item->image))}}"
                            style="width:100px;height:100px;" />
                        <div style="height: 10px"></div>
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-primary ms-2">{{$item->status==1?'Còn bán':'Hết
                                            hàng'}}</span></h5>
                                    @if ($item->promotion_sale!=0)
                                    <h5><span class="badge bg-danger ms-2">-{{$item->promotion_sale}}%</span></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <h5 class="card-title mb-3">{{$item->name}}</h5>
                        </a>
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <p>{{Category::find($list_product[0]->category_id)->name}}</p>
                        </a>
                        @if($item->promotion_sale!=0)
                        <div class="d-flex justify-content-center align-items-end h-100">
                            <h6 class="mb-3 text-decoration-line-through opacity-25 price_promotion">
                                {{number_format($item->price,0,'',',')}} VND</h6>
                            <div style="width:20px"></div>
                            <h6 class="mb-3">
                                {{number_format($item->price-($item->price*($item->promotion_sale/100)),0,'',',')}} VND
                            </h6>
                        </div>
                        @else
                        <h6 class="mb-3" id=price>{{number_format($item->price,0,'',',')}} VND</h6>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary active" role="button"
                            aria-pressed="true">@lang('mutilanguage.add_cart')</a>
                        <div style="width: 10px;"></div>
                        <a href="{{route('detailProduct',['id'=>$item->ID])}}" class="btn btn-secondary active"
                            role="button" aria-pressed="true">@lang('mutilanguage.detail')</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        const price=document.getElementById('price');
           
            Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
            };
        let a={!!json_encode($product->toArray())!!}
        let price_promotion={!! json_encode($product->promotion_sale)!!}
        let temp= document.getElementById('price_sale');
        let sale=document.getElementById('sale')
        
        console.log(price_promotion);
        console.log(a.price_sizeM)
        function chooseSize(size){
       
            if(size=='L'){
                if(price_promotion!=0){
                   temp.textContent=a.price_sizeL.format()+' VND'
                   temp.classList='dis-price'
                   sale.textContent=(a.price_sizeL-(a.price_sizeL*(price_promotion/100))).format()+'VND'
                   sale.classList.add('act-price')
                }
                else{

                    price.textContent=a.price_sizeL.format()+' VND'
                }
            }
            if(size=='M'){
                if(price_promotion!=0){
                    temp.textContent=a.price_sizeM.format()+' VND'
                    temp.classList='dis-price'
                    sale.textContent=(a.price_sizeM-(a.price_sizeM*(price_promotion/100))).format()+'VND'
                    sale.classList.add('act-price')
                   
                }
                else{

                    price.textContent=a.price_sizeM.format()+' VND'
                }
            }
            if(size=='S'){
                if(price_promotion!=0){
                temp.textContent=a.price.format()+' VND'
                temp.classList='dis-price'
                sale.textContent=(a.price-(a.price*(price_promotion/100))).format()+'VND'
                sale.classList.add('act-price')
               
                }
                else{

                    price.textContent=a.price.format()+' VND'
                }
            }
            price.classList.add('fw-bold')
        }
        let counter = 0;
        
        function increment() {
        counter++;
        }
        
        function decrement() {
        counter--;
        }
        
        function get() {
        return counter;
        }
        
        const inc = document.getElementById("increment");
        const input = document.getElementById("input");
        const dec = document.getElementById("decrement");
        
        inc.addEventListener("click", () => {
        increment();
        input.value = get();
        });
        
        dec.addEventListener("click", () => {
        if (input.value > 0) {
        decrement();
        }
        input.value = get();
        });
    </script>
</body>

</html>