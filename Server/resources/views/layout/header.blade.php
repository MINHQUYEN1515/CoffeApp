@php
use App\Config\UrlBase;
@endphp
<style>
    .cart_header {
        position: relative;
        width: 45px;
    }

    .cart_header::after {
        content: attr(data-value);
        width: 25px;
        height: 25px;
        position: absolute;
        background-color: red;
        display: block;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        right: 0;
        color: white;
        bottom: -6.6px;
    }

    .cart_header-no::after {
        content: none;
    }
</style>
@include('layout.loading')
<header class=" p-3 mb-3 border-bottom ">
    <div class=" container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="https://www.highlandscoffee.com.vn/vnt_upload/weblink/White_logo800.png" alt="mdo" width="50"
                height="50" class="rounded-circle " style="background-color: #b22830">
            <div style="width:20px"></div>
            <ul class="nav col-19 col-lg-auto me-lg-auto mb-5 justify-content-center mb-md-0 " id="menu">
                <li><a href="{{route('index')}}"
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
                    <li><a class="dropdown-item" href="{{route('userOrder')}}">@lang('mutilanguage.order')</a></li>
                    <li><a class="dropdown-item" href="{{route('settingAddress')}}">@lang('mutilanguage.setting')</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('account-index') }}">@lang('mutilanguage.profile')</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">@lang('mutilanguage.logout')</a></li>
                </ul>

            </div>
            @endauth
            @if(!auth()->check())
            <a href="{{ route('login-page')}}"><img src="/icon/logo/logo_person.svg" alt=""
                    style="width:50px;height:50px; margin-right: 15px"></a>
            @endif
            <div style="width: 15px;"></div>
            @auth
            <div class='cart_header'>

                <a href="{{ route('youCart')}}"><img src="/icon/logo/cart.png" alt=""
                        style="width:30px;height:30px"></a>

            </div>
            @endauth
            <div style="width:30px"></div>
            <div class="float-right d-flex justify-content-end">
                <div class="dropdown text-end">
                    <button class="btn btn-secondary dropdown-toggle bg-primary" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('mutilanguage.language')
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" style="width: 10px;" href="/setlanguage/vi">Tiếng Việt <i><img
                                    style="width: 40px;"
                                    src="//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/125px-Flag_of_Vietnam.svg.png"
                                    alt="vietnam" style="width:30px;height:30px"></i></a>
                        <a class="dropdown-item" style="width: 10px;" href="/setlanguage/en">English
                            <i><img style="width: 40px; height: 26px;"
                                    src="//upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg/125px-Flag_of_the_United_Kingdom_%281-2%29.svg.png"
                                    alt="english" style="width:30px;height:30px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
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
        const quantity={!! json_encode(session('quantity'))!!}
        if(quantity==0){
            document.querySelector('.cart_header').classList.add('cart_header-no')
        }
        else{
            document.querySelector('.cart_header').setAttribute('data-value', quantity);
        }   
    
</script>