<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Payment;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\HelperClass;

class UserController extends Controller
{
    public function index(){
        session()->reflash();
        $user = Auth::user();
        if($user->user_type == 'pharmacy'){

            if(isset($_GET['payment']) == 'success'){
                return redirect('pharmacy-dashboard')->with('payment_success','Payment has been successfully made and drug has been booked for you.');

            }

            return redirect('pharmacy-dashboard');
        }

        $data['user'] = $user;

        if(isset($_GET['payment']) == 'success'){
            $data['payment_success'] = 'Payment has been successfully made and drug has been booked for you.';

        }
        $data['subscriptions'] = DB::table('subscriptions')
            ->join('drugs', 'drugs.id', '=', 'subscriptions.drug_id')
            ->where('subscriptions.user_id',Auth::id())
            ->select('subscriptions.id as sid','drugs.*','subscriptions.status as sstatus')

            ->get();

        return view('patient-dashboard',$data);
    }

    public function pharmacy_dashboard(){
        session()->reflash();
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

    public function sell_drug(Request $request){
        $sub = Subscription::find($request->sub_id);
        $sub->status = 'sold';
        $sub->save();
        return redirect('subscribed-users')->with('status','subscription status updated');

    }



    public function post_drug(Request $request){
        $request->validate([
            'drug_name' => 'required','editor1' => 'required','expiry_date' => 'required','price'=> 'required'
        ]);

        $path = $request->file('drug_image')->store('public/drug_image');
        $drug = new Drug();
        $drug->drug_name = $request->drug_name;
        $drug->dosage = $request->editor1;
        $drug->image_path = $path;
        $drug->expiry_date = $request->expiry_date;
        $drug->price = $request->price;
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
            ->select('subscriptions.id as sid','drugs.*','users.*','subscriptions.status as sstatus')
            ->get();

        return view('subscribers',$data);
    }

    public function paypal_checkout(){

        $pharm = Drug::where('id',session()->get('drug_id'))->first();
        $sub = new Subscription();
        $sub->user_id = Auth::id();
        $sub->drug_id = session()->get('drug_id');
        $sub->pharmacy_id = $pharm->user_id;
        $sub->status = 'Active';

        $sub->save();

        $curl = new HelperClass();
        $data = [
            'intent'=> "sale",
            'redirect_urls'=>['return_url'=>url('home'),'cancel_url'=>url('home')],
            'payer'=>['payment_method'=>'paypal'],
            'transactions'=>array(['amount'=>['total'=>$pharm->price,'currency'=>'EUR']]),
        ];

        #curl token

        $client_id = env('PAYPAL_CLIENT_ID');
        $secret = env('PAYPAL_SECRET');
        $token_url = 'https://api.sandbox.paypal.com/v1/oauth2/token';
        $token_data = [
            'grant_type'=>'client_credentials'
        ];
        $token =  $curl->cURLToken($token_url,$client_id,$secret,$token_data);
        $response = $curl->cURLPostJson('https://api.sandbox.paypal.com/v1/payments/payment',$data,$token);
        $result = json_decode($response);


        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->paymentID = $result->id;
        $payment->total = $result->transactions[0]->amount->total;
        $payment->status = "initiated";
        $payment->save();

        return $response;
    }

    public function paypal_execute(Request $request){

        $curl = new HelperClass();
        $data = ['payer_id'=> $request->payerID];
        $client_id = env('PAYPAL_CLIENT_ID');
        $secret = env('PAYPAL_SECRET');
        $token_url = 'https://api.sandbox.paypal.com/v1/oauth2/token';
        $token_data = [
            'grant_type'=>'client_credentials'
        ];
        $token =  $curl->cURLToken($token_url,$client_id,$secret,$token_data);
        $url = 'https://api.sandbox.paypal.com/v1/payments/payment/'.$request->paymentID.'/execute/';
        $response =  $curl->cURLPostJson2($url,$data,$token);
        $result = json_decode($response);

        $payment = Payment::where('paymentId',$result->id)->first();
        $payment->status = 'successful';
        $payment->save();

    }

}
