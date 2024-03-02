@extends('layout.app')
@php
use App\Config\UrlBase;
use App\Models\Product;
@endphp
<style>
    .is-danger {
        color: red;
        /* You can customize the styles based on your needs */
        font-weight: bold;
        /* Add more styles as needed */
    }
</style>
@include('layout.header')

<body class="bg-light">
    @if(session("updateSuccess"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session("updateSuccess")}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        const close=document.querySelector('.close')
    const alert=document.querySelector('.alert-success')
    console.log(close)
    close.addEventListener('click',function(){
        alert.remove()
    })
    
    </script>
    @endif
    @if(session("updateFaild"))
    <div class="alert alert-waring alert-dismissible fade show" role="alert">
        <strong>{{session('updateFaild')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        const close=document.querySelector('.close')
        const alert=document.querySelector('.alert-success')
        console.log(close)
        close.addEventListener('click',function(){
            alert.remove()
            console.log(1)
        })
        
    </script>
    @endif
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">@lang('mutilanguage.you_cart')</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @if(empty($list_order))
                        @else
                        @foreach ($list_order as $item)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{Product::find($item->product_id)->name}}</h6>
                                <small class="text-muted">{{Product::find($item->product_id)->description}}</small>
                            </div>
                            <span class="text-muted fw-bold">{{number_format($item->total,0,'',',')}}VND</span>
                        </li>
                        @endforeach
                        @endif


                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">@lang('mutilanguage.billing_address')</h4>
                    <form class="needs-validation" novalidate="" action="{{route('updateAddress')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="" value="{{auth()->user()->id}}">
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <label for="firstName" class="form-label">@lang('mutilanguage.first_name')</label>
                                <input type="text" class="form-control" id="firstName" placeholder=""
                                    value="{{auth()->user()->firstname}}" name="first_name">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">@lang('mutilanguage.last_name')</label>
                                <input type="text" class="form-control" id="lastName" placeholder=""
                                    value="{{auth()->user()->lastname}}" required="" name="last_name">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">@lang('mutilanguage.username')</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required="" value="{{auth()->user()->username}}" name="username">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                    <p class="help is-danger">{{ $errors->first('username') }}</p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Email)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    value="{{auth()->user()->email}}" name="email">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">@lang('mutilanguage.phone') <span
                                        class="text-muted">(Phone)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                                    value="{{auth()->user()->phone}}" name="phone">
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">@lang('mutilanguage.address_shipping')<span
                                        class="text-muted">(Address Shipping)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                                    value="{{auth()->user()->address_shipping}}" name="address_shipping">
                                <p class="help is-danger">{{ $errors->first('address_shipping') }}</p>
                            </div>
                            <h4 class="mb-3">@lang('mutilanguage.payment')</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="payment" type="radio" class="form-check-input"
                                        checked="true" required="" value="cash_on_delivery">
                                    <label class="form-check-label"
                                        for="credit">@lang('mutilanguage.cash_on_delivery')</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="payment" type="radio" class="form-check-input"
                                        style="visibility:hidden;" required="" value="zalo_pay">
                                    <label class="form-check-label" for="debit" style="opacity: 0.4">Zalo Pay</label>
                                </div>
                            </div>


                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg"
                                type="submit">@lang('mutilanguage.checkout_continue')</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017–2021 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <script>

    </script>

</body>