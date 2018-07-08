
@extends('layouts.template')
@section('content')
<div class="card mb-3">
        <div class="card-header">


   <div class="col-md-10">
    <form method="post" action="{{url('old')}}">
    {{csrf_field()}}

    <table class='table table-hover  '>
        <input type="hidden" class="form-control" name="user_type" value="old_user">
        <tr>
            <td>Amount to Send </td>  
            <td><input type="text" class="form-control" name="amount" value=""></td>
        </tr>
        <tr>
            <td>Name of Receivcer </td>  
            <td><select name="contacts_id" id="contacts_id" class="form-control input-lg dynamic" data-dependent="accounts">
    <option value="">Select Receiver</option>
     <option value="new" >New Receiver</option>
     @foreach($receiver as $users)
     <option value="{{ $users->id}}">{{ $users->fname." ".$users->lname}}</option>
     @endforeach
    </select></td>


        </tr>
        
        
        <tr class ="receiver_select">  
            <td colspan="2"><nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="visibility: hidden;"></a>
    <a class="nav-item nav-link old_rec_bb" id="tab_receiver_bank" data-toggle="tab" href="" role="tab" aria-controls="nav-profile" aria-selected="false"> Send to Bank</a>
    <a class="nav-item nav-link old_rec_mm" id="tab_receiver_mm" data-toggle="tab" href="" role="tab" aria-controls="nav-contact" aria-selected="false">Send to MM</a>
  </div>
</nav>
</td>
        </tr>
        
  <input type="hidden" class="form-control" name="raccount_type" id="raccount_type" value="">
       <tr id="receiver_mm" class="receiver_mm">
            <td>Phone Number </td>  
            <td>
                <input id="phone" type="tel"  name="rphonenumber" name="phonenumber" value=""></td>
            <input id="country" type="hidden"  name="rcountry"  value=""></td>
        </tr>
        <tr  id="receiver_mm1" class="receiver_mm">
            <td>Reg User </td>  
            <td><input type="text" class="form-control"  id="account_number5" name="rregusername" value=""></td>
        </tr>
        
        <tr id="receiver_bk1" class="receiver_bk">
            <td>Bank Name </td>  
            <td><input type="text" class="form-control" name="rbankname" value=""></td>
        </tr>
        <tr id="receiver_bk2" class="receiver_bk">
            <td>Account Holder </td>  
            <td><input type="text" class="form-control" name="raccount_name" value=""></td>
        </tr>
        <tr id="receiver_bk3" class="receiver_bk">
            <td>Account Number for receiver</td>  
            <td><input type="text" class="form-control" id="account_number"name="raccount_number" value=""></td>
        </tr>
  
        <tr class="receiver_acc_select">  
            <td>Receiver Account </td>
            <td><select name="receivers_account" id="receivers_account" class="form-control input-lg ">
     <option value="">New Account</option>
    </select></td>
        </tr>


        <tr class="existing_account">
            <td>Select Account to Send From </td>  
            <td><select name="senders_account" id="senders_account" class="form-control input-lg dynamic" >
     @foreach($Accounts_possed as $acc)
     <option value="{{ $acc->id}}">{{ $acc->account_name}}</option>
     @endforeach
    </select></td>


        </tr>
      


        
       <tr id="owners_account" class="option_r_a_type">  
            <td colspan="2"><nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="visibility: hidden;"></a>
    <a class="nav-item nav-link receiver_bk  receiver_mm" id="tab_sender_bank" data-toggle="tab" href="" role="tab" aria-controls="nav-profile" aria-selected="false">Send Using Bank</a>
    <a class="nav-item nav-link receiver_mm receiver_bk" id="tab_sender_mm" data-toggle="tab" href="" role="tab" aria-controls="nav-contact" aria-selected="false">Send Using MM</a>
  </div>
</nav>
</td>
        </tr>
        <input type="hidden" class="form-control" name="saccount_type" id="saccount_type" value="">
        <tr  class="senderbk">
            <td>Your Bank Name </td>  
            <td><input type="text" class="form-control sender_bk" name="sbankname" value=""></td>
        </tr>
        <tr  class="senderbk">
            <td>Your Account Name </td>  
            <td><input type="text" class="form-control sender_bk" name="saccount_name" value=""></td>
        </tr>
        <tr  class="senderbk">
            <td>Account Number </td>  
            <td><input type="text" id="uaccount_number sender_bk" class="form-control" name="saccount_number" value=""></td>
        </tr>
        <tr class="sendermm">
            <td>Phone Number </td>  
            <td>
                <input id="phone" type="tel"  name="sphonenumber" value="" class="sendermm"></td>
        </tr>
        <tr  class="sendermm">
            <td>Reg User </td>  
            <td><input type="text" id="sregusername" class="form-control sendermm" name="name" value=""></td>
        </tr>
        <tr  class="sendermm senderbk">
            <td></td>  
            <td><button type="submit" class="btn btn-primary">Send Money</button></td>

        </tr>


        <tr  class="sendbtn">
            <td></td>  
            <td><button type="submit" class="btn btn-primary">Send Money</button></td>

        </tr>


</table>




    </form> 
</div>
    




  <script type="text/javascript">
      
      
  </script>                      

                         








<br>
<br>



      </div>
   
@endsection