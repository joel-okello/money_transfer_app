
@extends('layouts.template')
@section('content')
<div class="card mb-3">
        <div class="card-header">









  @if(!$account)
    <h4 align="center" class="page-header">Create Account</h4>  
    <form method="POST" action="{{url('account')}}" aria-label="{{ __('Register Account') }}">
                        {{csrf_field()}}
                        @if($user_id_of_account)  
                        <input type="hidden" name="user_id" value="{{($user_id_of_account)}}">
                        @endif
                        <div class="form-group row">
                            <label for="account_type" class="col-md-4 col-form-label text-md-right">{{ __('Select Account Type') }}</label>

                        <div class="col-md-6">
                        <select id="account_type" name="account_type" class="account_type">
                          <option selected>Choose Account type</option>
                          <option value="bank_account">Bank Account</option>
                          <option value="mobile_money">Mobile Money Account</option>
                        </select>
                        @if ($errors->has('account_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>

                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" value="{{ old('account_name') }}" required autofocus>

                                @if ($errors->has('account_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" id="registered_name">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Registered Name') }}</label>

                            <div class="col-md-6">
                                <input id="registered_name" type="text" class="form-control{{ $errors->has('registered_name') ? ' is-invalid' : '' }}" name="registered_name" value="{{ old('registered_name') }}" required autofocus>

                                @if ($errors->has('registered_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registered_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group row" id="bank_name">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Name') }}</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" value="{{ old('bank_name') }}" required autofocus>

                                @if ($errors->has('bank_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        

                         


                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{ old('account_number') }}" required autofocus>

                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Account') }}
                                </button>

                            </div>
                        </div>
                    </form> 
  
@endif




@if($account)
    <h4 align="center" class="page-header">Update Account</h4>  
    <form method="post" action="{{action('AccountController@update',$id)}}">
    {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group row">
                            <label for="account_type" class="col-md-4 col-form-label text-md-right">{{ __('Select Account Type') }}</label>

                        <div class="col-md-6">
                        <select name="account_type" class="account_type">
                          <option value="bank_account">Bank Account</option>
                          <option value="mobile_money">Mobile Money Account</option>
                        </select>
                        @if ($errors->has('account_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>

                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control{{ $errors->has('account_name') ? ' is-invalid' : '' }}" name="account_name" value="{{$account->account_name}}" required autofocus>

                                @if ($errors->has('account_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         


                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{$account->account_number}}" required autofocus>

                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Account') }}
                                </button>

                            </div>
                        </div>
                    </form> 
  
@endif

<br>
<br>



      </div>
   
@endsection