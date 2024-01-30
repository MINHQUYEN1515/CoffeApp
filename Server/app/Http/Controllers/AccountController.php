<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function profile()
    {
        return view('Account.Customer.index');
    }
    public function login_page()
    {
        return view('Account.Customer.login');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'phone_number' => 'required',
            'password' => 'required|string|min:6',
            're_password' => 'required_with:password|same:password|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if (User::where('username', $request->username)->first()) {
            return back()->with('faild', 'Username available');
        } else {
            $customer = User::create([
                'email' => $request->email,
                'phone' => $request->phone_number,
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'role' => User::ROLE['customer'],
                'status' => User::STATUS['active'],
                'lastname' => $request->last_name,
                'firstname' => $request->first_name,
                'username' => $request->username,
                'birthday' => $request->birth_date,
                'sex' => $request->gender,
                'createDay' => now()
            ]);
            if ($request->has('image')) {
                $filename = $request->file('image')->getClientOriginalName() + now();
                $customer->image = $filename;
                $request->file('image')->move(base_path('public\storage\image\customer'), $filename);
            }

            $customer->save();
            return back()->with('success', 'create acccount success! ');
        }
    }
    public function login(Request $request)
    {

        $request->validate([
            'username_login' => 'required',
            'password_login' => 'required|string|min:6',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $user = [
            'username' => $request->username_login,
            'password' => $request->password_login
        ];


        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->route('account-index');
        }

        return Redirect::back()->withErrors([
            'username_faild' => 'Username or password not found'
        ]);
    }
}
