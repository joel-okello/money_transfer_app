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
        $transactions =  DB::table('accounts')->where('accounts.user_id', '=', Auth::User()
            ->id)
            ->Join('transactions',   'transactions.sender_account',  '=', 'accounts.id')
            ->join('accounts as reciever_acc', 'transactions.reciever_account','=','reciever_acc.id')
            ->join('users as reciever','reciever_acc.user_id','=','reciever.id')
            ->select('sender_account as sender_ac', 'reciever.fname as reciever_fn', 'reciever_acc.account_name as reciever_ac','amount','accounts.account_name')
        
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
          
        $this->validate($request,['sending_acc' => 'required|string|max:3','receiving_acc' => 'required|string|max:3','amount' => 'required|string|max:255']);

        $transactions = new transactions([ 'sender_account' => $request->sending_acc,'reciever_account' => $request->receiving_acc,'amount' => $request->amount,
        ]);


        
        
        $transactions->save();
        return redirect()->route('transactions.index')->with('success','Transaction completed Successfully');
    }



    public function sending_from_bank_to_mobile($sending_acc_id,$receiving_acc_id)
    {
         
         $sending_acc_info = DB::table('accounts')->where('accounts.id', '=', $sending_acc_id)
        ->join('users','accounts.user_id','=','users.id')
        ->first();
        $sending_acc_type=$sending_acc_info->account_type; 
        
         $receiving_acc_info = DB::table('accounts')->where('accounts.id', '=', $receiving_acc_id)
        ->join('users','accounts.user_id','=','users.id')
        ->first();
        $receiving_acc_type = $receiving_acc_info->account_type; 
        if($sending_acc_type=="bank_account"&&$receiving_acc_type=="mobile_money"){
            return $receiving_acc_info->country;
        }
        else{
            return false;
        }
    }


    public function change_the_currency($sending_acc,$receiving_acc,$amount)
    {
        if($this->sending_from_bank_to_mobile($sending_acc,$receiving_acc)){
          $receivers_country = $this->sending_from_bank_to_mobile($sending_acc,$receiving_acc);  
        }
        else 
            return $amount;

        $equivalent_currenncy_in_dollars = null;
        $url = 'http://apilayer.net/api/live?access_key=8ec5b3713e38fc76925badaa8bfb46b9 '; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $characters = json_decode($data); // decode the JSON feed
        $kenya_to_USD = $characters->quotes->USDKES;
        $uganda_to_USD = $characters->quotes->USDUGX;
        $Rwanda_to_USD = $characters->quotes->USDRWF;
        if($receivers_country=='Uganda')
        {
            $equivalent_currenncy_in_dollars = $amount * $uganda_to_USD;   
        }
        else if ($receivers_country=='Kenya')
        {
            $equivalent_currenncy_in_dollars = $amount * $kenya_to_USD;  
        }
        else
        {
            $equivalent_currenncy_in_dollars = $amount * $Rwanda_to_USD;  
        }
        return $equivalent_currenncy_in_dollars;

        

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions =  DB::table('accounts')->where('accounts.user_id', '=', Auth::User()
            ->id)
            ->Join('transactions',   'transactions.sender_account',  '=', 'accounts.id')
            ->join('accounts as reciever_acc', 'transactions.reciever_account','=','reciever_acc.id')
            ->join('users as reciever','reciever_acc.user_id','=','reciever.id')
            ->select('sender_account as sender_ac', 'reciever.fname as reciever_fn', 'reciever_acc.account_name as reciever_ac','amount','accounts.account_name')
        
            ->get()->toArray();  
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
