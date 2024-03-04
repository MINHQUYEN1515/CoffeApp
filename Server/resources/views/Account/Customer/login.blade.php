<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
    <title>Login</title>
    <style>
        /* @extend display-flex; */
        display-flex,
        .form-flex,
        .form-row,
        .add-info-link {
            display: flex;
            display: -webkit-flex;
        }

        /* @extend list-type-ulli; */
        list-type-ulli,
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* Montserrat-300 - latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 300;
            src: url("../fonts/montserrat/Montserrat-Light.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url("../fonts/montserrat/Montserrat-Regular.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: italic;
            font-weight: 400;
            src: url("../fonts/montserrat/Montserrat-Italic.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            src: url("../fonts/montserrat/Montserrat-Medium.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            src: url("../fonts/montserrat/Montserrat-SemiBold.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: url("../fonts/montserrat/Montserrat-Bold.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: italic;
            font-weight: 700;
            src: url("../fonts/montserrat/Montserrat-BoldItalic.ttf");
            /* IE9 Compat Modes */
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: italic;
            font-weight: 900;
            src: url("../fonts/montserrat/montserrat-v12-latin-900.ttf"), url("../fonts/montserrat/montserrat-v12-latin-900.eot") format("embedded-opentype"), url("../fonts/montserrat/montserrat-v12-latin-900.svg") format("woff2"),
                url("../fonts/montserrat/montserrat-v12-latin-900.woff") format("woff"),
                url("../fonts/montserrat/montserrat-v12-latin-900.woff2") format("truetype");
        }

        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
            transition: all 300ms ease 0s;
            -moz-transition: all 300ms ease 0s;
            -webkit-transition: all 300ms ease 0s;
            -o-transition: all 300ms ease 0s;
            -ms-transition: all 300ms ease 0s;
        }

        input,
        select,
        textarea {
            outline: none;
            appearance: unset !important;
            -moz-appearance: unset !important;
            -webkit-appearance: unset !important;
            -o-appearance: unset !important;
            -ms-appearance: unset !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            appearance: none !important;
            -moz-appearance: none !important;
            -webkit-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            margin: 0;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            box-shadow: none !important;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -o-box-shadow: none !important;
            -ms-box-shadow: none !important;
        }

        input[type=checkbox] {
            appearance: checkbox !important;
            -moz-appearance: checkbox !important;
            -webkit-appearance: checkbox !important;
            -o-appearance: checkbox !important;
            -ms-appearance: checkbox !important;
        }

        input[type=radio] {
            appearance: radio !important;
            -moz-appearance: radio !important;
            -webkit-appearance: radio !important;
            -o-appearance: radio !important;
            -ms-appearance: radio !important;
        }

        input[type=number] {
            -moz-appearance: textfield !important;
            appearance: none !important;
            -webkit-appearance: none !important;
        }

        input:-webkit-autofill {
            box-shadow: 0 0 0 30px transparent inset;
            -moz-box-shadow: 0 0 0 30px transparent inset;
            -webkit-box-shadow: 0 0 0 30px transparent inset;
            -o-box-shadow: 0 0 0 30px transparent inset;
            -ms-box-shadow: 0 0 0 30px transparent inset;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        figure {
            margin: 0;
        }

        p {
            margin-bottom: 0px;
            font-size: 15px;
            color: #777;
        }

        h2 {
            line-height: 1.66;
            margin: 0;
            padding: 0;
            font-weight: 900;
            color: #222;
            font-family: 'Montserrat';
            font-size: 24px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 40px;
        }

        .clear {
            clear: both;
        }

        body {
            font-size: 13px;
            line-height: 1.8;
            color: #222;
            font-weight: 600;
            font-family: 'Montserrat';
            background: #c5e9ff;
            padding: 115px 0;
        }

        a {
            color: #1da0f2;
        }

        .container {
            width: 680px;
            position: relative;
            margin: 0 auto;
            box-shadow: 0px 10px 9.9px 0.1px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 10px 9.9px 0.1px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0px 10px 9.9px 0.1px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0px 10px 9.9px 0.1px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0px 10px 9.9px 0.1px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        .signup-content {
            padding: 10px 0;
        }

        .signup-form {
            padding: 58px 50px 0px 50px;
            height: 900px;
            overflow-y: auto;
        }

        .signup-form::-webkit-scrollbar-track {
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            background-color: #f8f8f8;
            width: 10px;
        }

        .signup-form::-webkit-scrollbar {
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            width: 10px;
            background-color: #fff;
        }

        .signup-form::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            background-color: #ebebeb;
        }

        label,
        input {
            display: block;
            width: 100%;
        }

        label {
            text-transform: uppercase;
            font-weight: 800;
            margin-bottom: 3px;
        }

        input {
            border: 1px solid #ebebeb;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            box-sizing: border-box;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: bold;
            font-family: 'Montserrat';
        }

        input:focus {
            border: 1px solid #1da0f2;
        }

        input::-webkit-input-placeholder {
            color: #999;
            text-transform: uppercase;
            font-weight: 600;
        }

        input::-moz-placeholder {
            color: #999;
            text-transform: uppercase;
            font-weight: 600;
        }

        input:-ms-input-placeholder {
            color: #999;
            text-transform: uppercase;
            font-weight: 600;
        }

        input:-moz-placeholder {
            color: #999;
            text-transform: uppercase;
            font-weight: 600;
        }

        .form-radio {
            margin-bottom: 40px;
        }

        .form-radio input {
            width: 0;
            height: 0;
            position: absolute;
            left: -9999px;
        }

        .form-radio input+label {
            margin: 0px;
            padding: 12px 10px;
            width: 94px;
            height: 50px;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
            text-align: center;
            border: 1px solid #ebebeb;
            background-color: #FFF;
            font-size: 14px;
            font-weight: 600;
            color: #888;
            text-align: center;
            text-transform: none;
            transition: border-color .15s ease-out, color .25s ease-out, background-color .15s ease-out, box-shadow .15s ease-out;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
        }

        .form-radio input:checked+label {
            background-color: #1da0f2;
            color: #FFF;
            border-color: #1da0f2;
            z-index: 1;
        }

        .form-radio input:focus+label {
            outline: none;
        }

        .form-radio input:hover {
            background-color: #1da0f2;
            color: #FFF;
            border-color: #1da0f2;
        }

        .form-flex input+label:first-of-type {
            border-radius: 5px 0 0 5px;
            -moz-border-radius: 5px 0 0 5px;
            -webkit-border-radius: 5px 0 0 5px;
            -o-border-radius: 5px 0 0 5px;
            -ms-border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .form-flex input+label:last-of-type {
            border-radius: 0 5px 5px 0;
            -moz-border-radius: 0 5px 5px 0;
            -webkit-border-radius: 0 5px 5px 0;
            -o-border-radius: 0 5px 5px 0;
            -ms-border-radius: 0 5px 5px 0;
            border-left: none;
        }

        .form-row {
            margin: 0 -11px;
        }

        .form-row .form-group,
        .form-row .form-radio {
            width: 50%;
            padding: 0 11px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }


        .form-radio {
            position: relative;
        }

        .form-icon {
            position: relative;
        }

        .ui-datepicker-trigger {
            position: absolute;
            right: 25px;
            top: 41px;
            color: #999;
            font-size: 18px;
            background: transparent;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .add-info-link {
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 900;
            margin-bottom: 16px;
            align-items: center;
            -moz-align-items: center;
            -webkit-align-items: center;
            -o-align-items: center;
            -ms-align-items: center;
        }

        .add-info-link .zmdi {
            font-size: 18px;
            padding-right: 14px;
        }

        .add_info {
            display: none;
        }

        ul {
            background: 0 0;
            position: relative;
            z-index: 9;
        }

        ul li {
            padding: 5px 0px;
            z-index: 2;
            color: #222;
            font-size: 14px;
            font-weight: 900;
        }

        ul li:not(.init) {
            display: none;
            background: #fff;
            color: #222;
            padding: 5px 10px;
        }

        ul li:not(.init):hover,
        ul li.selected:not(.init) {
            background: #1da0f2;
            color: #fff;
        }

        li.init {
            cursor: pointer;
            position: relative;
            border: 1px solid #ebebeb;
            padding: 12px 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
        }

        li.init:after {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            font-size: 18px;
            color: #999;

            content: '\f2f9';
            font-weight: 400;
        }

        .form-submit {
            width: auto;
            background: #1da0f2;
            color: #fff;
            text-transform: uppercase;
            font-weight: 900;
            padding: 16px 50px;
            float: right;
            border: none;
            margin-top: 37px;
            cursor: pointer;
        }

        .form-submit:hover {
            background: #0c85d0;
        }

        .select-list {
            position: relative;
            display: inline-block;
            width: 100%;
            margin-bottom: 47px;
        }

        .list-item {
            position: absolute;
            width: 100%;
        }

        #country {
            z-index: 99;
        }

        #city {
            z-index: 9;
        }

        .is-danger {
            color: red;
            /* You can customize the styles based on your needs */
            font-weight: bold;
            /* Add more styles as needed */
        }

        .required::after {
            content: " (*)";
            color: red;
            font-weight: bold;
        }

        @media screen and (max-width: 768px) {
            .container {
                width: calc(100% - 30px);
                max-width: 100%;
            }
        }

        /*
            css message account success
            */
        .toast {
            position: absolute;
            top: 25px;
            right: 30px;
            border-radius: 6px;
            background: #fff;
            padding: 20px 35px 20px 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transform: translateX(calc(100% + 30px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.25, 1.35);
        }

        .toast--success {
            border-left: 8px solid #40f467;
        }

        .toast--error {
            border-left: 8px solid #ff623d;
        }

        .toast.active {
            transform: translateX(0);
        }

        .toast-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .toast-check {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 35px;
            width: 35px;
            background-color: #40f467;
            border-radius: 50%;
            color: #fff;
            font-size: 20px;
        }

        .toast-check-error {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 35px;
            width: 35px;
            background-color: #ff623d;
            border-radius: 50%;
            color: #fff;
            font-size: 20px;
        }

        .message {
            display: flex;
            flex-direction: column;
            margin: 0 20px;
        }

        .message-text {
            font-size: 20px;
            font-weight: 600;
        }

        .text-1 {
            color: #333;
        }

        .text-2 {
            color: #666;
            font-weight: 400;
            font-size: 16px;
        }

        .toast-close {
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
        }

        .toast-close:hover {
            opacity: 1;
        }

        .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: #ddd;
        }

        .progress::before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #40f467;
        }

        .progress-error {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: #ddd;
        }

        .progress-error::before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #ff623d;
        }

        .progress.active::before {
            animation: progress 5s linear forwards;
        }

        @keyframes progress {
            100% {
                right: 100%;
            }
        }

        .toast-btn {
            padding: 10px 40px;
            font-size: 20px;
            outline: none;
            border: none;
            background-color: #40f467;
            color: #fff;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toast-btn:hover {
            background-color: #0fbd35;
        }

        .title {
            width: 100%;
            border-radius: 3px;
            background-color: #fff;
        }

        .title>nav {
            display: flex;

        }

        .title>nav>div {
            flex: 1;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;


        }

        .selected {
            background-color: #57b846;
            animation: change ease .6s;
        }

        @keyframes change {
            from {

                opacity: 0;
            }

            to {

                opacity: 1;
            }
        }

        .show {
            display: block;
        }



        #signin-content {
            display: none;
        }

        /* css header */
    </style>
</head>

<body>
    @if (session('success'))
    <div class="toast active toast--success">
        <div class="toast-content">
            <i class="uil uil-check toast-check"></i>
            <div class="message">
                <span class="message-text text-1">Success</span>
                <span class="message-text text-2">{{session('success')}}</span>
            </div>
        </div>
        <i class="uil uil-multiply toast-close"></i>
        <div class="progress"></div>
    </div>
    <script>
        var close = document.querySelector(".toast-close");
        var toast = document.querySelector(".toast");
        close.addEventListener("click", () =>{
        toast.classList.remove("active");
        setTimeout(() =>{
        progress.classList.remove("active");
        }, 300)
        })
    </script>
    @endif
    @if (session('faild'))
    <div class="toast active toast--error">
        <div class="toast-content">
            <i class="uil uil-multiply toast-check-error"></i>
            <div class="message">
                <span class="message-text text-1">Faild</span>
                <span class="message-text text-2">{{session('faild')}}</span>
            </div>
        </div>

        <i class="uil uil-multiply toast-close"></i>
        <div class="progress-error"></div>
    </div>
    <script>
        var close = document.querySelector(".toast-close");
        var toast = document.querySelector(".toast");
        close.addEventListener("click", () =>{
        toast.classList.remove("active");
        setTimeout(() =>{
        progress.classList.remove("active");
        }, 300)
        })
    </script>
    @endif

    <div class="main">
        <section class="signup">
            <div class="container container-signup">
                <div class="title" id='title-content'>
                    <nav>
                        <div class="signup-title selected">Signup</div>
                        <div class="signin-title">Signin</div>
                    </nav>
                </div>
                <div class="signup-content" id="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{route('signup')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-input" name="first_name" id="first_name"
                                    value="{{ old('first_name')}}" />
                                <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-input" name="last_name" id="last_name"
                                    value="{{ old('last_name')}}" />
                                <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-icon">
                                <label for="birth_date">Birth date</label>
                                <input type="date" class="form-input" name="birth_date" id="birth_date"
                                    placeholder="MM-DD-YYYY" value="{{ old('birth_date')}}" />
                                <p class="help is-danger">{{ $errors->first('birth_date') }}</p>
                            </div>
                            <div class="form-radio">
                                <label for="gender">Gender</label>
                                <div class="form-flex">
                                    <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                    <label for="male">Male</label>

                                    <input type="radio" name="gender" value="female" id="female" />
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="required">Username</label>
                            <input type="text" class="form-input" name="username" id="username"
                                value="{{ old('username')}}" />
                            <p class="help is-danger">{{ $errors->first('username') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="required">Phone number</label>
                            <input type="number" class="form-input" name="phone_number" id="phone_number"
                                value="{{ old('phone_number')}}" />
                            <p class="help is-danger">{{ $errors->first('phone_number') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="required">Email </label>
                            <input type="text" class="form-input" name="email" id="email" value="{{ old('email')}}" />
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Address</label>
                            <input type="text" class="form-input" name="address" id="address"
                                value="{{ old('address')}}" />
                            <p class="help is-danger">{{ $errors->first('address') }}</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password" class="required">Password</label>
                                <input type="password" class="form-input" name="password" id="password"
                                    value="{{ old('password')}}" />
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="re_password" class="required">Repeat your password</label>
                                <input type="password" class="form-input" name="re_password" id="re_password" />
                                <p class="help is-danger">{{ $errors->first('re_password') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Image</label>
                            <input type="file" class="form-input" name="image" id="image"
                                accept="image/png; image/jpeg" />
                            <p class="help is-danger">{{ $errors->first('image') }}</p>
                        </div>
                        <div class="form-group">
                            <strong>Google Captcha</strong>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                            <p class="help is-danger">{{ $errors->first('g-recaptcha-response') }}</p>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
                        </div>
                </div>


                </form>
            </div>
            {{-- sign in --}}
            <div class="container">
                <div class="signup" id="signin-content">
                    <form method="POST" id="signip-form" class="signup-form" action="{{route('login')}}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="phone_number" class="required">Username</label>
                            <input type="text" class="form-input" name="username_login" id="username_login"
                                value="{{ old('username')}}" />
                            <p class="help is-danger">{{ $errors->first('username_login') }}</p>
                            @if($errors->has('username_faild'))
                            <p class="help is-danger">{{ $errors->first('username_faild') }}</p>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="password" class="required">Password</label>
                            <input type="password" class="form-input" name="password_login" id="password_login"
                                value="{{ old('password')}}" />
                            <p class="help is-danger">{{ $errors->first('password_login') }}</p>
                        </div>
                        <div class="form-group">
                            <strong>Google Captcha</strong>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                            <p class="help is-danger">{{ $errors->first('g-recaptcha-response') }}</p>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit_login" class="form-submit" value="Submit" />
                        </div>

                </div>
                </form>
            </div>
    </div>
    </section>
    <script>
        const btnsignin=document.querySelector(".signin-title");
        const btnsignup=document.querySelector(".signup-title");
         const signup=document.querySelector('#signup-content')
        const signin=document.querySelector('#signin-content')
        btnsignin.addEventListener('click',function(){
        btnsignin.classList.add('selected')
        btnsignup.classList.remove('selected')
        signup.style.setProperty('display','none')
        signin.style.setProperty('display','block')
        });  
        btnsignup.addEventListener('click',function(){
            
            btnsignin.classList.remove('selected')
            btnsignup.classList.add('selected')
            signin.style.setProperty('display','none')
            signup.style.setProperty('display','block')
        });
        document.addEventListener('DOMContentLoaded', function() {
            if(btnsignin.classList[1]!=='selected'){
                btnsignin.classList.add('selected')
                btnsignup.classList.remove('selected')
                signup.style.setProperty('display','none')
                signin.style.setProperty('display','block')
            }
          
        });
    </script>
</body>

</html>