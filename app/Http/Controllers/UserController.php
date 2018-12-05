<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->user_type == 'pharmacy'){
            return redirect('pharmacy-dashboard');
        }
        $data['user'] = $user;
        return view('patient_dashboard',$data);
    }

    public function pharmacy_dashboard(){
        $user = Auth::user();
        $data['user'] = $user;
        return view('pharmacy_dashboard',$data);
    }
}
