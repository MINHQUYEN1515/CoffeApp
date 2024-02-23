@extends('layout.app')
@php
use App\Config\UrlBase;
@endphp
@include('layout.header')

<body class="bg-light">

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">@lang('mutilanguage.you_cart')</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Product name</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Third item</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
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
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">

                                <label for="firstName" class="form-label">@lang('mutilanguage.first_name')</label>
                                <input type="text" class="form-control" id="firstName" placeholder=""
                                    value="{{auth()->user()->firstname}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">@lang('mutilanguage.last_name')</label>
                                <input type="text" class="form-control" id="lastName" placeholder=""
                                    value="{{auth()->user()->lastname}}" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">@lang('mutilanguage.username')</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required="" value="{{auth()->user()->username}}">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    value="{{auth()->user()->email}}">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">@lang('mutilanguage.phone') <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                                    value="{{auth()->user()->phone}}">
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">@lang('mutilanguage.address_shipping')<span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"
                                    value="{{auth()->user()->address_shipping}}">
                            </div>
                            <hr class="my-4">


                            <hr class="my-4">

                            <h4 class="mb-3">@lang('mutilanguage.payment')</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        checked="" required="">
                                    <label class="form-check-label"
                                        for="credit">@lang('mutilanguage.cash_on_delivery')</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                        required="">
                                    <label class="form-check-label" for="debit">Zalo Pay</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                        required="">
                                    <label class="form-check-label" for="paypal">PayPal</label>
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