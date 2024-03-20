<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $list_manager = User::where('role', User::ROLE['manager'])->get();
        return view('Account.admin.index', compact('user', 'list_manager'));
    }
    //----------------Member-------------------------
    public function addMember(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|min:10',
            'status' => 'required'
        ]);
        DB::beginTransaction();
        try {
            User::create([
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt("123456"),
                'address' => $request->address,
                'role' => User::ROLE['manager'],
                'status' => $request->status,
                'username' => $request->name,
                'created_day' => now()
            ]);
            DB::commit();
            return response()->json([
                "status" => 200,
                "message" => trans('app.message_success'),
                "data" => []
            ]);
        } catch (\Throwable $error) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "message" => trans('app.message_faild'),
                "data" => [
                    "error" => $error
                ]
            ]);
        }
    }
}
