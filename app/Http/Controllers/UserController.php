<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Drug;
use Illuminate\Support\Facades\DB;
use App\Subscription;

class UserController extends Controller
{
    public function index(){
        session()->reflash();
        $user = Auth::user();
        if($user->user_type == 'pharmacy'){
            return redirect('pharmacy-dashboard');
        }
        $data['user'] = $user;
        return view('patient-dashboard',$data);
    }

    public function pharmacy_dashboard(){
        $user = Auth::user();
        $data['user'] = $user;
        $data['created_drugs'] = Drug::where('user_id',Auth::id())->get();
        return view('pharmacy_dashboard',$data);
    }

    public function add_drug(){
        $user = Auth::user();
        if($user->status <> 'active'){
            return redirect('home')->with('error_status','You are unable to add a product yet until you are verified by Admin');
        }
        $data['user'] = $user;
        return view('add-drugs',$data);
    }

    public function post_drug(Request $request){
        $request->validate([
            'drug_name' => 'required','editor1' => 'required','expiry_date' => 'required'
        ]);

        $image = $request->file('drug_image');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/drug-images');
        $image->move($destinationPath, $image_name);

        $drug = new Drug();
        $drug->drug_name = $request->drug_name;
        $drug->dosage = $request->editor1;
        $drug->image_path = $image_name;
        $drug->expiry_date = $request->expiry_date;
        $drug->user_id = Auth::id();
        $drug->status = 'Active';
        $drug->save();

        return redirect('home')->with('status','Drug created successfully and awaiting approval');

    }

    public function subscribed_users(){
        $data['user'] = Auth::user();
        $data['subscribed_users'] = DB::table('subscriptions')
            ->join('users', 'users.id', '=', 'subscriptions.user_id')
            ->join('drugs', 'drugs.id', '=', 'subscriptions.drug_id')
            ->where('pharmacy_id',Auth::id())
            ->get();


        return view('subscribers',$data);
    }

}
