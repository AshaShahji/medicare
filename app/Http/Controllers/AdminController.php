<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drug;
use App\User;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index(){

        $data['pharmacy'] = User::where('user_type','pharmacy')->orderBy('id','DESC')->get();
        return view('admin.index',$data);
    }

    public function activate_account(Request $request){
        $pharm = User::find($request->pharmacy_id);
        $pharm->status = 'active';
        $pharm->save();
        return back()->with('status','Pharmacy store activated on the platform');
    }

    public function deactivate_account(Request $request){
        $pharm = User::find($request->pharmacy_id);
        $pharm->status = 'unactive';
        $pharm->save();
        return back()->with('status','Pharmacy store deactivated on the platform');
    }

    public function view_store_drugs($id){
        $data['drugs'] = Drug::where('user_id',$id)->get();
        return view('admin.view-drugs',$data);

    }

    public function drugs(){
        $data['drugs'] = DB::table('drugs')
            ->join('users', 'drugs.user_id', '=', 'users.id')
            ->select('drugs.*', 'users.name')
            ->get();
        return view('admin.drugs',$data);
    }
    public function activate_drug(Request $request){
        $drug = Drug::find($request->drug_id);
        $drug->status = 'Active';
        $drug->save();
        return back()->with('status','Drug activated on the platform');
    }

    public function deactivate_drug(Request $request){
        $drug = Drug::find($request->drug_id);
        $drug->status = 'not Active';
        $drug->save();
        return back()->with('status','Drug deactivated on the platform');
    }

}
