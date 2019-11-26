<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
         $userid=Auth::user()->id;
         $weekly = DB::table('expenses')
                ->whereRaw('date(expenses.date) > DATE_SUB(NOW(), INTERVAL 1 WEEK)')
                ->select('expenses.date', DB::raw('DATE(expenses.date) AS DATE,DAYNAME(expenses.date) as DAY,SUM(amount) AS total'))
                ->where('userid',$userid)
                ->groupBy('expenses.date')
                ->get();

        $thiswk=($weekly->toArray());
        $daily = DB::table('expenses')
                ->join('expcategory','expenses.catid','=','expcategory.id')
                ->whereDay('date', Carbon::now())
                ->where('userid',$userid)
                ->select('expcategory.id','expcategory.category','expcategory.bgcolor','expenses.date', DB::raw('SUM(amount) as total'))
                ->groupBy('expcategory.id')
                ->get();

        $today=($daily->toArray());
        

        $mntexp = DB::table('expenses')
                ->whereMonth('date', Carbon::now()->month)
                ->where('userid',$userid)
                ->sum('amount');
        
        $yrexpense = DB::table('expenses')
                ->whereYear('date', Carbon::now()->year)
                ->where('userid',$userid)
                ->sum('amount');
        $dayexpense= DB::table('expenses')
                ->whereDay('date', Carbon::now())
                ->where('userid',$userid)
                ->sum('amount');
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $wkexpense = DB::table('expenses')
                ->whereBetween('date', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
                ->where('userid',$userid)
                ->sum('amount');
                
        $data=DB::table('expenses')
            ->join('expcategory','expenses.catid','=','expcategory.id')
            ->where('expenses.userid',$userid)
            ->get();
        $expenses=$data->toArray();
        return view('admin',['id'=>$userid,'expenses'=>$expenses,'year'=>$yrexpense,'month'=>$mntexp,'day'=>$dayexpense,'week'=>$wkexpense,'today'=>$today]);
    }

    public function incomePage(){
        $category=DB::table('expcategory')
                    ->get();
        $cat=$category->toArray();
        $account=DB::table('accounts')
                ->get();
        $act=$account->toArray();
        $userid=Auth::user()->id;
        return view('income',['category'=>$cat,'account'=>$act,'id'=>$userid]);
    }

    public function expensePage(){
        $category=DB::table('expcategory')
                    ->get();
        $cat=$category->toArray();
        $account=DB::table('accounts')
                ->get();
        $act=$account->toArray();
        $userid=Auth::user()->id;
        return view('expense',['category'=>$cat,'account'=>$act,'id'=>$userid]);

    }
    public function historyPage(){
        $userid=Auth::user()->id;
         $category=DB::table('expcategory')
                    ->get();
        $cat=$category->toArray();
        $account=DB::table('accounts')
                ->get();
        $act=$account->toArray();
        $data=DB::table('expenses')
            ->join('expcategory','expenses.catid','=','expcategory.id')
             ->join('accounts','expenses.account','=','accounts.id')
             ->where('userid',$userid)
             ->select('expenses.*','expcategory.category','accounts.myaccount')
            ->get();
        $expenses=$data->toArray();
        return view('history',['expenses'=>$expenses,'category'=>$cat,'account'=>$act]);

    }
    public function profilePage(){

        
        return view('profile');
    }

    public function changePassword(Request $request){
        $userid=Auth::user()->id;
        $oldpass= $request->input('password');
        $newpass1 =$request->input('newpass1');
        $newpass2 =$request->input('newpass2');
        
        $message=[
            'password.required' => 'Password field is required',
            'newpass1.required' => 'New Password field is required',
            'newpass2.required'  => 'Confirm Password field is required',
            'newpass2.same'  => 'Passwords do not match',
            'newpass1.min'  => 'Passwords must be a minimum of 8 characters',
        ];
        $validation = $request->validate([
                        'password' => 'required|string',
                        'newpass1'=>'required|string|min:8',
                        'newpass2'=>'required|same:newpass1',
                        ],$message);

        $mypwd=Hash::make($newpass1);

        $password= DB::table('users')
                ->where('id',$userid)
                ->select('password')
                ->get();
        $password1=$password->toArray();
        foreach ($password1 as $key) {
            $correctpass= $key->password;
        }

        if (Hash::check($oldpass, $correctpass)) {
            
            DB::table('users')
                ->where('id',$userid)
                ->update(['password' => $mypwd]);
            session()->flash('message','Password Update Successful');
            return redirect()->action('HomeController@profilePage');
        }else{
            session()->flash('message','Incorrect Password Entered'.$oldpass.' '.$correctpass.' '.$mypwd);
            return redirect()->action('HomeController@profilePage');
        }



    }
    public function retrievedata(Request $request){
        $id=$request->id;
        $daily = DB::table('expenses')
                ->join('expcategory','expenses.catid','=','expcategory.id')
                ->whereDay('date', Carbon::now())
                ->where('userid',$id)
                ->select('expcategory.id','expcategory.category','expcategory.bgcolor','expenses.date', DB::raw('SUM(amount) as total'))
                ->groupBy('expcategory.id')
                ->get();

        $today=($daily->toArray());

        return json_encode($today);

    }

    public function retrieveweekdata(Request $request){
        $id=$request->id;
        $weekly = DB::table('expenses')
                ->whereRaw('date(expenses.date) > DATE_SUB(NOW(), INTERVAL 1 WEEK)')
                ->where('userid',$id)
                ->select('expenses.date', DB::raw('DATE(expenses.date) AS DATE,DAYNAME(expenses.date) as DAY,SUM(amount) AS total'))
                ->groupBy('expenses.date')
                ->get();

        $thiswk=($weekly->toArray());
        return json_encode($thiswk);
    }
    public function retrieveyeardata(Request $request){

        $id=$request->id;
        $yearly = DB::table('expenses')
                ->whereRaw('YEAR(expenses.date)=YEAR(CURDATE())')
                ->where('userid',$id)
                ->select('expenses.date', DB::raw('MONTHNAME(expenses.date) AS Month, SUM(amount) AS total'))
                ->groupBy(DB::raw('YEAR(expenses.date),MONTH(expenses.date)'))
                ->get();

        $thisyr=($yearly->toArray());
        return json_encode($thisyr);
    }
    
}
