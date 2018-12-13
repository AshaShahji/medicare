<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function verify(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('admin_access', true);
                return redirect('admin-home');

            } else {
                return redirect('admin-login')->with('error_status', 'Invalid email or password');

            }
        }
    }
}
