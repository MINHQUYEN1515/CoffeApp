@extends('layout.app')
@php
use App\Config\UrlBase;
use App\Models\Category;
use App\Models\Product;
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<section style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>{{Category::find($product[0]->category_id)->name}}</strong></h4>
        <div class="row">
            @foreach ($product as $item)
            <div class="col-lg-4 col-md-12 mb-4">
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
                    <div class="card-body">
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <h5 class="card-title mb-3">{{$item->name}}</h5>
                        </a>
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <p>{{Category::find($product[0]->category_id)->name}}</p>
                        </a>
                        @if($item->promotion_sale!=0)
                        <div class="d-flex justify-content-center align-items-end h-100">
                            <h6 class="mb-3 text-decoration-line-through opacity-25">{{$item->price}} VND</h6>
                            <div style="width:20px"></div>
                            <h6 class="mb-3">{{$item->price-($item->price*($item->promotion_sale/100))}} VND</h6>
                        </div>
                        @else
                        <h6 class="mb-3">{{$item->price}} VND</h6>
                        @endif
                    </div>

                    <div class="" d-flex justify-content-evenly"">
                        <a href="#" class="btn btn-primary active" role="button"
                            aria-pressed="true">@lang('mutilanguage.add_cart')</a>
                        <a href="{{route('detailProduct',['id'=>$item->ID])}}" class="btn btn-secondary active"
                            role="button" aria-pressed="true">@lang('mutilanguage.detail')</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    menu = document.querySelector("#menu")
        menu.addEventListener("click", function(event) {
            if ((event.target.tagName === 'A' && event.target.parentNode.tagName === 'LI')) {
                // Get the text content of the clicked <li> element
                var clickedItemText = event.target;
                document.querySelector(".bg-info").classList.remove("bg-info")
                clickedItemText.classList.add("bg-info")

            }
        })
        function showDetail(id){
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          const response= await fetch(`/product/detail/${id}`,{
          method : 'POST',
          headers: {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
        },
        credentials: "same-origin",
        body: JSON.stringify({
        id:id
        })
          )
        if(response.ok){
            console.log(response.json());
        }
        }
    }

   
    
</script>