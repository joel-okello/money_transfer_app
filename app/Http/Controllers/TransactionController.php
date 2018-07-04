<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accounts;
use DB;
use App\User;
use App\transactions;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $account = null; 
        $accounts_possed = null;  
        $transactions =  DB::table('accounts')->where('user_id', '=', Auth::User()
            ->id)
            ->Join('transactions',   'transactions.sender_account',  '=', 'accounts.id')
            ->get()->toArray();  

        return view('transactions',compact('transactions','accounts_possed','account'));
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
        return redirect()->route('transactions.index')->with('success','Transaction completed Successfully');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
