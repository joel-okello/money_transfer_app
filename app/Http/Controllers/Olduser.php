<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;
Use App\User;
Use App\Contacts;
Use App\transactions;
Use App\accounts;
use Hash;
class Olduser extends Controller
{

	private $receivers_accounts_id = null;
	private $receivers_contact_id = null;

    public function index()
    {
         
    
         $receiver = DB::table('users')->where('created_by', '=', Auth::User()->id)
            ->get()->toArray();  
           

         $Accounts_possed = DB::table('accounts')->where('user_id', '=', Auth::User()->id)->get()->toArray();
        if($Accounts_possed){
        return view('old',compact('receiver','Accounts_possed'));	
        }
        else{
        	return view('new');
        }
        

    }


    



    function test(Request $request)
    {

     $select = $request->get('select');
     $value = $request->get('value');

     $contact_id = $request->get('contact_id');

     
     $data = DB::table('users')->where('created_by', '=', Auth::User()->id)
            ->Join('accounts',   'accounts.user_id',  '=', 'users.id')
            ->where('users.id',$contact_id)
            ->get()->toArray();
            $options = "<option value=''>Select Account</option><option value='new'>New Account</option>";


            foreach ($data as $account) {
                    	$options=$options."<option value=".$account->id.">".$account->account_name."</option>";
            }
     return $options;   
	}
 

	public function store(Request $request)
    {
         
      
        $this->receivers_accounts_id = ($request->receivers_account)?$request->receivers_account:"";
    	     
        if($request->contacts_id =="new")
       {

       	$entered_names = ($request->rregusername)?$request->rregusername:$request->raccount_name;
       	$names = explode(' ',trim($entered_names));
        //register receiceiver as a contact
                //if receiver phone is null make country null invalid
         $receiver_country = ($request->rphonenumber) ? $request->rcountry:"";
         $contact = new User([
            'country' => $receiver_country,
            'phonenumber' => $request->rphonenumber,
            'fname' => $names[0],
            'lname' => (count($names)>1)?$names[1]:"",
            'email' => $request->email,
            'created_by' => Auth::user()->id
        ]);
         
        $contact->save();     
        $this->receivers_contact_id = $contact->id;
        } 

        
  
      $this->regiseter_account($request);  
 
     $this->make_transaction($request);

    return redirect()->route('old');

	}     


	public function regiseter_account($request)
	{
        
    if($request->receivers_account == "new"||$request->contacts_id =="new")
    {
    //register an account for receiver 
            //if acc type is mobile acc number is phone number
	      $receiver_account_number = ($request->raccount_type=="mobile_money")?$request->rphonenumber:$request->raccount_number;
	      
	      $receiver_account = new accounts([

	            'account_name' => ($request->raccount_name)?$request->raccount_name:$request->rregusername,
	            'account_number' => $receiver_account_number,
	            'account_type' => $request->raccount_type,
	            'user_id' => ($request->contacts_id =="new")?
	             $this->receivers_contact_id:$request->contacts_id
	        ]);
	      $receiver_account->save();
	      $this->receivers_accounts_id = $receiver_account->id;
   
    }
    return true;

	}


         public function make_transaction($request)
    {
        

    	 //register transaction
       $transaction = new transactions([ 
       	'sender_account' => $request->senders_account,
       	'reciever_account' => $this->receivers_accounts_id,
       	'amount' => $request->amount,
        ]);
       $transaction->save();
       


       
     return true;
    }


}
