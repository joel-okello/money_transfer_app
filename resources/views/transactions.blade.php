
@extends('layouts.template')
@section('content')
@if($account) 
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
           
    <h4 align="center" class="page-header">Transaction Details</h4>      
      <form method="POST" action="{{url('transactions')}}" aria-label="{{ __('Register Contact') }}">
                        {{csrf_field()}}
 
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('From Account') }}</label>

                            <div class="col-md-6">
                          <select name="sending_acc" class="account_type" style="width: 100%">
                          <option selected>Choose Account </option>
                            
                           @foreach($accounts_possed as $row1)
                          <option value="{{$row1->id}}">{{$row1->account_name}}</option>
                          @endforeach
                        </select>

                             <input id="amount" type="hidden" name="receiving_acc" value="{{$account->id}}" >  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" required autofocus >

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ $userinfo->fname }}" required readonly="readonly">

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ $userinfo->lname }}" required autofocus readonly="readonly">

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>

                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" value="{{ $account->account_name }}" required autofocus readonly="readonly">

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                      

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make Transaction') }}
                                </button>

                            </div>
                        </div>
                    </form>

                    
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endif






@if(!$account)
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
          <i class="fa fa-table"></i>Your Transactions</div> 
          <div class='right-button-margin'>
            <br>
           <a href="{{url('contacts')}}" class='btn btn-success pull-right'>Create New Trasaction</a>
           <br
         </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>

                <tr>
                  <th>Origin Account</th>
                  <th>Amount</th>
                  <th>Receivers Name</th>
                  <th>Receivers Account</th>
                </tr>
              </thead>
              
              <tbody>

                   
      @if($transactions)
      @foreach($transactions as $row)
      <tr>
        <td>{{$row->account_name}}</td>
         <td>{{$row->amount}}</td>
         <td>{{$row->reciever_fn}}</td>
         <td>{{$row->reciever_ac}}</td>
         

             </tr>

      @endforeach
      @endif
    </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endif
      @endsection





