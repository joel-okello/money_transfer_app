<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accounts;
use DB;
use App\User;
use App\transactions;
use Auth;

class TransactionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	dd('Calling index method');
        $account = null;   
         $contacts = DB::table('users')->where('created_by', '=', Auth::User()->id)
            ->leftJoin('accounts',   'accounts.user_id',  '=', 'users.id')
            ->select('users.id','users.fname','users.lname', 'accounts.account_name','accounts.account_number','accounts.account_type','accounts.id as acc_id')
            ->get()->toArray();  
    

        return view('contacts',compact('contacts','contact','id'));
    }

    public function edit($id)
    {
    	
        $account = accounts::find($id);
        $userinfo = User::find($account->user_id);
        $accounts_possed = DB::table('accounts')->where('user_id', '=', Auth::User()->id)->get()->toArray(); 


        return view('transactions',compact('account','userinfo','accounts_possed','id'));
    }



    public function store(Request $request)
    {


    
           
        $this->validate($request,['sending_acc' => 'required|string|max:3',
            'receiving_acc' => 'required|string|max:3',
            'amount' => 'required|string|max:255']);
        
       
      
        $transactions = new transactions([
            'sender_account' => $request->sending_acc,
            'reciever_account' => $request->receiving_acc,
            'amount' => $request->amount,
        ]);
        $transactions->save();
        return redirect()->route('transactions.index')->with('success','Contact Added Successfully');
    }
}
