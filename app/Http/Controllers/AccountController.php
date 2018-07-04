<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accounts;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
Use DB;
Use App\User;

class AccountController extends Controller
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
        $id = null;   
        $accounts = DB::table('accounts')->where('user_id', '=', Auth::User()->id)->get()->toArray();
        $user_id_of_account = null;
        
        return view('account',compact('accounts','account','id','user_id_of_account'));
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
    public function store(Request $request)
    {
            
        $this->validate($request,['account_name' => 'required', 'account_number' => 'required', 'account_type' => 'required']);
        
       
      
        $account = new accounts([
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
            'user_id' => Auth::user()->id
        ]);

        if($request->user_id)
           $account->user_id = $request->user_id;  
        $account->save();
        return redirect()->route('account.index')->with('success','Account Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user_id_of_account = $id;
        $account =null;
        $accounts = null;
        return view('account_edit_add',compact('accounts','account','id','user_id_of_account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = accounts::find($id);
        $accounts= DB::table('accounts')->where('user_id', '=', Auth::user()->id)->get()->toArray();
        $user_id_of_account = null;

        return view('account_edit_add',compact('account','accounts','id','user_id_of_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,['account_name' => 'required', 'account_number' => 'required', 'account_type' => 'required']);
        
       
         $account = accounts::find($id);
         $account->account_name = $request->account_name;
         $account->account_number = $request->account_number;
         $account->account_type = $request->account_type;
         $account->save();
        return redirect()->route('account.index')->with('success','Account Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $account = accounts::find($id);
       $account ->delete();
        return redirect()->route('account.index')->with('success','Account Deleted Sucessfully');;
    }
}
