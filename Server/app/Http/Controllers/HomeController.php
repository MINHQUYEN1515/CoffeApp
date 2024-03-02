<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {

        $category = Category::all();
        return view("index", compact('category'));
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
