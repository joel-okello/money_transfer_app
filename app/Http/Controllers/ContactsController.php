<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;
Use App\User;
Use App\Contacts;

class ContactsController extends Controller
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
         $contacts = DB::table('users')->where('created_by', '=', Auth::User()->id)
            ->leftJoin('accounts',   'accounts.user_id',  '=', 'users.id')
            ->select('users.*', 'accounts.*')
            ->get()->toArray();        
        return view('contacts',compact('contacts','contact','id'));
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
           
        $this->validate($request,['country' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'string|email|max:255']);
        
       
      
        $contact = new User([
            'country' => $request->country,
            'phonenumber' => $request->phonenumber,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'created_by' => Auth::user()->id
        ]);

        $contact->save();
        return redirect()->route('contacts.index')->with('success','Contact Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
