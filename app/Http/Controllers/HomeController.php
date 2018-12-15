<?php

namespace App\Http\Controllers;

use App\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function browse(){
        $data['drugs'] = DB::table('drugs')
            ->join('users', 'drugs.user_id', '=', 'users.id')
            ->where('drugs.status','Active')
            ->select('drugs.*', 'users.name')
            ->get();


        return view('browse',$data);
    }

    public function details($id){
        $data['drugs'] = DB::table('drugs')
            ->join('users', 'drugs.user_id', '=', 'users.id')
            ->where('drugs.status','Active')
            ->where('drugs.id',$id)
            ->select('drugs.*', 'users.name')
            ->get();

        session()->put('drug_id',$data['drugs'][0]->id);


        return view('details',$data);
    }

    public function search(Request $request){
        $drug = $request->drug_name;
        $query = DB::table('drugs')
            ->join('users','drugs.user_id','=', 'users.id')
            ->where('drug_name','like','%'.$drug.'%')
            ->get();

        $data['drugs'] = $query;

        return view('search_result',$data);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
