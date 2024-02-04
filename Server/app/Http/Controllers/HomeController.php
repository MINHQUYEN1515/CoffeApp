<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {

        return view("index");
    }

    public function setlanguage($language)
    {
        app()->setLocale($language);
        Session::put('locale', $language);
        return back();
        // $user = $request->user();
        // $user->language = $request->language;
        // $user->save();
        // return back();
    }
}
