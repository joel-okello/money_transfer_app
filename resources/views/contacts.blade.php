
@extends('layouts.template')
@section('content')
 


        
<div class="card mb-3">
        <div class="card-header">
            @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>

    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      {{(\Session::get('success'))}}
    </div>
    @endif
          <i class="fa fa-table"></i>Your Contacts</div> 
          <div class='right-button-margin'>
            <br>
           <a href="{{url('contact_edit')}}" class='btn btn-success pull-right'>Create New Contact</a>
           <br
         </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Account Type</th>
                  <th>Account Number</th>
                  <th>Send Money</th>
                </tr>
              </thead>
              
              <tbody>



             
                   
      @if($contacts)
      @foreach($contacts as $row)
      <tr>
        <td>{{$row->fname}}</td>
        <td>{{$row->lname}}</td>
         <td>@if($row->account_type){{$row->account_type}}
         @endif

         
         @if(!$row->account_type)<a href="{{action('AccountController@show',$row->id)}}"> 
          <button type="button" class="btn btn-success">Add Account</button></a>@endif
       </td>
         <td>@if($row->account_number){{$row->account_number}}
         @endif
         
       </td>

        <td>@if($row->account_number)<a href="{{action('TransactionController@edit',$row->acc_id)}}">
          <button type="button" class="btn btn-success">Send Money</button></a>@endif</td>
        

      </tr>

      @endforeach
      @endif
    </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endsection


