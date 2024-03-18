<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\Backtrace\File;

class AccountController extends Controller
{
    public function profile()
    {

        $user = Auth::user();

        return view('Account.Customer.index', compact('user'));
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
                'created_day' => now()
            ]);
            if ($request->has('image')) {
                $filename = time()  . $request->file('image')->getClientOriginalName();
                $customer->image = $filename;
                $request->file('image')->move(base_path('public\storage\image\customer'), $filename);
            } else {
                $customer->image = 'user.png';
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
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        $user = [
            'username' => $request->username_login,
            'password' => $request->password_login
        ];


        if (Auth::attempt($user)) {
            $users = auth()->user();
            if ($users->role == User::ROLE['admin']) {
                return redirect()->route('indexAdmin');
            }
            return redirect()->route('account-index');
        }

        return Redirect::back()->withErrors([
            'username_faild' => 'Username or password not found'
        ]);
    }
    public function editProfile(Request $request)
    {
        App::setLocale('vi');
        $request->validate([
            'username' => 'required',
            'email' => 'required|email'
        ]);
        try {
            $user = User::find(Auth::user()->id);
            $user->username = $request->username;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->sex = $request->sex;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->birthday = $request->birthday;
            $user->updated_at = now();
            $user->save();
            return back()->with('success', 'change information user success! ');
        } catch (Exception $excetion) {
            return back()->with('faild', 'change information user faild!');
        }
    }
    public function changeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $user = User::find(Auth::user()->id);
            $filename = time() . $request->file('image')->getClientOriginalName();
            $image_path = public_path('storage/image/customer/' . $user->image);
            if (file_exists($image_path)) {

                unlink($image_path);
            }
            $request->file('image')->move(base_path('public\storage\image\customer'), $filename);
            $user->image = $filename;
            $user->save();
            return back()->with('successImage', 'update image success! ');
        } catch (Exception $excetion) {
            return back()->with('faildImage', 'update image faild!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return back();
    }
}
