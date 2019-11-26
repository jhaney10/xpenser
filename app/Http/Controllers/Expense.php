<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Expense extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function addIncome(Request $request){
        $userid=Auth::user()->id;
        $message=[
            'amount.numeric' => 'Please enter amount in digits',
            'amount.required' => 'Please enter the amount',
             'date.required'  => 'Please enter the date',
              
        ];
        $validation = $request->validate([
                        'date' => 'required',
                        'amount'=>'required|numeric',
                        ],$message);
        $amt=$request->input('amount');
        $date=$request->input('date');
        $account=$request->input('account');
        $note=$request->input('note');
        $type=$request->input('type');
        $id=$request->input('id');
        $addincome= DB::table('expenses')->insert(
                ['amount' => $amt,'date'=>$date,'account'=>$account, 'note'=>$note, 'type'=>$type,'userid'=>$userid]
            );
        if ($addincome) {
        	session()->flash('message','New Income has been added');
       		return redirect()->action('HomeController@index');
        }
        else{
        	return redirect()->action('HomeController@expensepage');
        }
        
        
    }
    public function addExpense(Request $request){
        $userid=Auth::user()->id;
        $message=[
            'amount.numeric' => 'Please enter amount in digits',
            'amount.required' => 'Please enter the amount',
             'date.required'  => 'Please enter the date',
              
        ];
        $validation = $request->validate([
                        'date' => 'required',
                        'amount'=>'required|numeric',
                        ],$message);
        $amt=$request->input('amount');
        $cat=$request->input('category');
        $date=$request->input('date');
        $account=$request->input('account');
        $note=$request->input('note');
         $type=$request->input('type');
         $id=$request->input('id');
        $addexpense= DB::table('expenses')->insert(
                ['amount' => $amt, 'catid' => $cat, 'date'=>$date,'account'=>$account, 'note'=>$note, 'type'=>$type,'userid'=>$userid]
            );
        if ($addexpense) {
        	session()->flash('message','New Expense has been added');
       		return redirect()->action('HomeController@historyPage');
        }
        else{
        	return redirect()->action('HomeController@expensepage');
        }
        
        
    }
     public function deleteExpense(Request $request){
        $id=$request->id;
        $delete=DB::table('expenses')->where('id', $id)->delete();
        session()->flash('message','Entry deleted');
        return back();
        
    }

    public function retrieve(Request $request){

        $id=$request->id;
       $data=DB::table('expenses')
            ->join('expcategory','expenses.catid','=','expcategory.id')
             ->join('accounts','expenses.account','=','accounts.id')
             ->select('expenses.*','expcategory.id AS expid','accounts.id AS actid')
             ->where(['expenses.id'=>$id])
            ->get();
        $expenses=$data->toArray();

        return json_encode($expenses);
        
    }
    public function editExpense(Request $request){

        $message=[
            'amount.numeric' => 'Please enter amount in digits',
            'amount.required' => 'Please enter the amount',
             'date.required'  => 'Please enter the date',
              
        ];
        $validation = $request->validate([
                        'date' => 'required',
                        'amount'=>'required|numeric',
                        ],$message);
        $amt=$request->input('amount');
        $cat=$request->input('category');
        $date=$request->input('date');
        $account=$request->input('account');
        $note=$request->input('note');
        $id=$request->input('id');

        $editexpense= DB::table('expenses')
        			->where(['id'=>$id])
        			->update(['amount' => $amt, 'catid' => $cat, 'date'=>$date,'account'=>$account, 'note'=>$note, 'type'=>'expense']);
        			
        if ($editexpense) {
        	session()->flash('message','Update Successful');
       		return redirect()->action('HomeController@historyPage');
        }
        
    }
}
