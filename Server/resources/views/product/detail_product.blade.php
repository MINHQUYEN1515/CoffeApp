@extends('layout.app')
@php
use App\Config\UrlBase;
use App\Models\Category;
use App\Models\Product;
@endphp
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@if(session('add_cart_success'))

@endif
@if(session('error_add_cart'))
<h1>error</h1>
@endif
<section style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5">
            <strong>{{empty($product)?Category::find($product[0]->category_id)->name:__("mutilanguage.no_data")}}</strong>
        </h4>
        <div class="row">
            @if(empty($product))
            @else
            @foreach ($product as $item)
            @if($item->number==0)
            <div class="col-lg-4 col-md-12 mb-4  prevent-select" style="opacity: 0.4;">
                <div class="card" style="padding-bottom:10px;">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="{{asset(UrlBase::getImageProduct($item->image))}}"
                            style="width:100px;height:100px;" />
                        <div style="width:100%;height:1px;background:black"></div>
                        <div style="height: 10px"></div>
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-dark bg-gradient ms-2">Hết hàng</span></h5>
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
                    <div class="card-body">
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <h5 class="card-title mb-3">{{$item->name}}</h5>
                        </a>
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <p>{{Category::find($product[0]->category_id)->name}}</p>
                        </a>
                        @if($item->promotion_sale!=0)
                        <div class="d-flex justify-content-center align-items-end h-100">
                            <h6 class="mb-3 text-decoration-line-through opacity-25">{{number_format($item->price,0, '',
                                ',')}} VND
                            </h6>
                            <div style="width:20px"></div>
                            <h6 class="mb-3">
                                {{number_format($item->price-($item->price*($item->promotion_sale/100)),0,'',',')}} VND
                            </h6>
                        </div>
                        @else
                        <h6 class="mb-3">{{number_format($item->price)}} VND</h6>
                        @endif

                    </div>
                    <div class="" d-flex justify-content-evenly"">
                        <a style="pointer-events: none;" href="{{route('youCart',['id'=>$item->ID])}}"
                            class="btn btn-primary =" role="button"
                            aria-pressed="true">@lang('mutilanguage.add_cart')</a>
                        <a style="pointer-events: none;" href="{{route('detailProduct',['id'=>$item->ID])}}"
                            class="btn btn-secondary =" role="button" aria-pressed="true">@lang('mutilanguage.buy')</a>
                    </div>

                </div>
            </div>

            @else
            <div class="col-lg-4 col-md-12 mb-4 ">
                <div class="card" style="padding-bottom:10px;">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="{{asset(UrlBase::getImageProduct($item->image))}}"
                            style="width:100px;height:100px;" />
                        <div style="width:100%;height:1px;background:black"></div>
                        <div style="height: 10px"></div>
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-primary ms-2">Đang bán</span></h5>
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
                    <div class="card-body">
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <h5 class="card-title mb-3">{{$item->name}}</h5>
                        </a>
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <p>{{Category::find($product[0]->category_id)->name}}</p>
                        </a>
                        @if($item->promotion_sale!=0)
                        <div class="d-flex justify-content-center align-items-end h-100">
                            <h6 class="mb-3 text-decoration-line-through opacity-25">{{number_format($item->price,0, '',
                                ',')}} VND
                            </h6>
                            <div style="width:20px"></div>
                            <h6 class="mb-3">
                                {{number_format($item->price-($item->price*($item->promotion_sale/100)),0,'',',')}} VND
                            </h6>
                        </div>
                        @else
                        <h6 class="mb-3">{{number_format($item->price)}} VND</h6>
                        @endif

                    </div>
                    <div class="" d-flex justify-content-evenly"">
                        <a href="{{route('youCart',['id'=>$item->ID])}}" class="btn btn-primary active" role="button"
                            aria-pressed="true" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">@lang('mutilanguage.add_cart')
                            <input type="hidden" value="{{$item}}">
                        </a>
                        <input type="hidden" value="{{$item}}" id="data">
                        <a href="{{route('detailProduct',['id'=>$item->ID])}}" class="btn btn-secondary active"
                            role="button" aria-pressed="true">@lang('mutilanguage.buy')</a>
                    </div>

                </div>
            </div>
            <div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true"">
                <div class=" modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('mutilanguage.product_detail')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div style="width: 100px"></div>
                        <div class="container mt-5 mb-5 ">
                            <form action="{{route('storeOrder')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$item->ID}}" name="ID" id="data_id">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="images p-3">
                                                        <div class="text-center p-4"> <img id="main-image"
                                                                src="{{asset(UrlBase::getImageProduct($item->image))}}"
                                                                width="250" />
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="product p-4 ">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center"> <i
                                                                    class="fa fa-long-arrow-left"></i>
                                                                <span class="ml-1">Back</span>
                                                            </div> <i class="fa fa-shopping-cart text-muted"></i>
                                                        </div>
                                                        <div class="mt-4 mb-3"> <span
                                                                class="text-uppercase text-muted brand">{{Category::find($item->category_id)->name}}</span>
                                                            <h5 class="text-uppercase" id="data_name">{{$item->name}}
                                                            </h5>

                                                            <div class="price d-flex flex-row align-items-center justify-content-center "
                                                                id="data_sale_price">

                                                            </div>

                                                        </div>
                                                        <p class="about" id="data_description">{{$item->description}}
                                                        </p>
                                                        <div
                                                            style="d-flex flex-column align-items center justify-content-center">
                                                            <div class="sizes mt-5">
                                                                <h6 class="text-uppercase">Size</h6> <label
                                                                    class="radio">
                                                                    <input type="radio" name="size" value="price"
                                                                        checked onclick="chooseSize('S')">
                                                                    <span>S</span>
                                                                </label> <label class="radio">
                                                                    <input type="radio" name="size" value="price_sizeM"
                                                                        onclick="chooseSize('M')">
                                                                    <span>M</span> </label> <label class="radio"> <input
                                                                        type="radio" name="size" value="price_sizeL"
                                                                        onclick="chooseSize('L')">
                                                                    <span>L</span>
                                                                </label>
                                                            </div>
                                                            <div style="width: 100%;"
                                                                class="d-flex justify-content-center">
                                                                <div class="input-group">
                                                                    <button id="decrement" type="button"
                                                                        class="btn btn-dark">-</button>
                                                                    <input type="number" id="input" value="1" readonly
                                                                        name='quantity' class="text-center"
                                                                        style="text-align: right;
                                                                         width: 50px;height:38px;margin: auto; border: none;outline: none">
                                                                    <button id="increment" type="button"
                                                                        class="btn btn-dark ">+</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">@lang('mutilanguage.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('mutilanguage.add_cart')</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endif
    </div>
    </div>

</section>
<script>
    Number.prototype.format = function(n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
        };
        var data;
    $('a[data-bs-toggle=modal]').click(function(event){
        const data1=event.target.children[0].value;
        eval('data='+data1);
        document.getElementById('data_id').value=data.ID
        document.getElementById('data_name').textContent=data.name
        document.getElementById('main-image').src=`/storage/image/product/images/${data.image}`
        const price=document.getElementById('data_sale_price');
        
        if(data.promotion_sale!=0){
            if(price.firstChild){
                price.firstChild.remove()
            }
            let pra=document.createElement('div')
            let html=`
            <div>
            <span class="act-price" id='data_price_promotion'>${(data.price-(data.price*(data.promotion_sale/100))).format()}VND</span>
            <div style="width: 5px;"></div>
            <div class="ml-5"> <small class="dis-price" id='data_price'>${(data.price).format()}VND</small>
                <span class="badge bg-danger ms-2">-${data.promotion_sale}%</span>
            </div>
            </div>
            `
            pra.innerHTML=html.trim()
            pra=pra.firstChild;
            price.appendChild(pra)
        }
        else{
            if(price.firstChild){
            price.firstChild.remove()
            }
           let pra=document.createElement('div')
            pra.innerHTML=`<div class="ml-5" id='price'> <span class="fw-bold">${data.price.format()}
                    VND</span>
            
            </div>`
            pra=pra.firstChild;
            price.appendChild(pra)
        }
        document.getElementById('data_description').textContent=data.description;
       
    });
      function chooseSize(size){
          
          
            if(size=='M'){
                if(data.promotion_sale!=0){
                    document.getElementById('data_price_promotion').textContent=(data.price_sizeM-(data.price_sizeM*(data.promotion_sale/100))).format()+' VND'
                    document.getElementById('data_price').textContent=data.price_sizeM+' VND'
                    document.getElementById('data_price').classList.add('dis-price')
                }
                else{
                    document.getElementById('price').textContent=data.price_sizeM.format()+' VND'
            document.getElementById('price').classList.add('fw-bold')
                }
            }
            if(size=='L'){
            if(data.promotion_sale!=0){
            document.getElementById('data_price_promotion').textContent=(data.price_sizeL-(data.price_sizeL*(data.promotion_sale/100))).format()+' VND'
            document.getElementById('data_price').textContent=data.price_sizeL+' VND'
            document.getElementById('data_price').classList.add('dis-price')
            }
            else{
            document.getElementById('price').textContent=data.price_sizeL.format()+' VND'
            document.getElementById('price').classList.add('fw-bold')
            }
            }
            if(size=='S'){
            if(data.promotion_sale!=0){
            document.getElementById('data_price_promotion').textContent=(data.price-(data.price*(data.promotion_sale/100))).format()+ 'VND'
            document.getElementById('data_price').textContent=data.price+' VND'
            document.getElementById('data_price').classList.add('dis-price')
            }
            else{
            document.getElementById('price').textContent=data.price.format()+' VND'
            document.getElementById('price').classList.add('fw-bold')
            }
            }
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