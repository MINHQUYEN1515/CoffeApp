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
<header class=" p-3 mb-3 border-bottom ">
    <div class=" container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="https://www.highlandscoffee.com.vn/vnt_upload/weblink/White_logo800.png" alt="mdo" width="50"
                height="50" class="rounded-circle " style="background-color: #b22830">
            <div style="width:20px"></div>
            <ul class="nav col-19 col-lg-auto me-lg-auto mb-5 justify-content-center mb-md-0 " id="menu">
                <li><a href="#"
                        class="nav-link px-5 link-secondary  bg-info rounded-pill fw-bold">@lang('mutilanguage.menu')</a>
                </li>
                <li><a href="#"
                        class="nav-link px-5 link-dark  rounded-pill fw-bold rounded-pill">@lang('mutilanguage.promotion')</a>
                </li>
                <li><a href="#"
                        class="nav-link px-5 link-dark   rounded-pill fw-bold rounded-pill">@lang('mutilanguage.new')</a>
                </li>
                <li><a href="#"
                        class="nav-link px-5 link-dark  rounded-pill fw-bold rounded-pill">@lang('mutilanguage.service')</a>
                </li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            @auth
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset(UrlBase::getImageCustomer(auth()->user()->image))}}" alt="image user" width="32"
                        height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="z-index: 100">
                    <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="{{ route('account-index') }}">Trang cá nhân</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Thoát</a></li>
                </ul>

            </div>
            @endauth
            @if(!auth()->check())
            <a href="{{ route('login-page')}}"><img src="/icon/logo/logo_person.svg" alt=""
                    style="width:50px;height:50px"></a>
            @endif
            <div style="width:30px"></div>
            <div class="float-right d-flex justify-content-end">
                <div class="dropdown text-end">
                    <button class="btn btn-secondary dropdown-toggle bg-primary" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/setlanguage/vi">Tiếng Việt<i><img
                                    src="/icon/language/vietnam.jpg" alt="vietnam"
                                    style="width:30px;height:30px"></i></a>
                        <a class="dropdown-item" href="/setlanguage/en">English<i><img src="/icon/language/english.png"
                                    alt="english" style="width:30px;height:30px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image"
                                    src="{{asset(UrlBase::getImageProduct($product->image))}}" width="250" /> </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span
                                        class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span
                                    class="text-uppercase text-muted brand">{{Category::find($product->category_id)->name}}</span>
                                <h5 class="text-uppercase">{{$product->name}}</h5>
                                <div class="price d-flex flex-row align-items-center "> <span
                                        class="act-price">{{$product->price-($product->price*($product->promotion_sale/100))}}</span>
                                    <div class="ml-5"> <small class="dis-price">{{$product->price}} VND</small>
                                        <span> SALE:{{$product->promotion_sale}} OFF</span>
                                    </div>
                                </div>
                            </div>
                            <p class="about">{{$product->description}}</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio"
                                        name="size" value="S" checked> <span>S</span> </label> <label class="radio">
                                    <input type="radio" name="size" value="M"> <span>M</span> </label> <label
                                    class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label>
                                <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span>
                                </label> <label class="radio"> <input type="radio" name="size" value="XXL">
                                    <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> <button
                                    class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i
                                    class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group card-group-scroll">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                <a href="#!">
                    <div class="mask">
                        <div class="d-flex justify-content-start align-items-end h-100">
                            <h5><span class="badge bg-success ms-2">Eco</span></h5>
                        </div>
                    </div>
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                </a>
                <a href="" class="text-reset">
                    <p>Category</p>
                </a>
                <h6 class="mb-3">$61.99</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                <a href="#!">
                    <div class="mask">
                        <div class="d-flex justify-content-start align-items-end h-100">
                            <h5><span class="badge bg-success ms-2">Eco</span></h5>
                        </div>
                    </div>
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                </a>
                <a href="" class="text-reset">
                    <p>Category</p>
                </a>
                <h6 class="mb-3">$61.99</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                <a href="#!">
                    <div class="mask">
                        <div class="d-flex justify-content-start align-items-end h-100">
                            <h5><span class="badge bg-success ms-2">Eco</span></h5>
                        </div>
                    </div>
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                </a>
                <a href="" class="text-reset">
                    <p>Category</p>
                </a>
                <h6 class="mb-3">$61.99</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                <a href="#!">
                    <div class="mask">
                        <div class="d-flex justify-content-start align-items-end h-100">
                            <h5><span class="badge bg-success ms-2">Eco</span></h5>
                        </div>
                    </div>
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                </a>
                <a href="" class="text-reset">
                    <p>Category</p>
                </a>
                <h6 class="mb-3">$61.99</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                    class="w-100" />
                <a href="#!">
                    <div class="mask">
                        <div class="d-flex justify-content-start align-items-end h-100">
                            <h5><span class="badge bg-success ms-2">Eco</span></h5>
                        </div>
                    </div>
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </a>
            </div>
            <div class="card-body">
                <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                </a>
                <a href="" class="text-reset">
                    <p>Category</p>
                </a>
                <h6 class="mb-3">$61.99</h6>
            </div>
        </div>
    </div>
</div>