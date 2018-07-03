@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @extends('layouts.app')

@section('content')




<div class="container">
<div class="row">
  <div class="col-md-12"> 
  </br>
</br>
    <h3 align="center" class="page-header">Movies Crude operation</h3>
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
    


    @if($movie)
    <form method="POST" action="" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

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
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>

                                @if ($errors->has('phonenumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
    @endif

@if(!$movie)
 <form method="post" enctype="multipart/form-data" action="{{url('movies')}}">
    {{csrf_field()}}
    <table class='table table-hover'>
 
        <tr>
            <td>Movie Name </td>  
            <td><input type="text" class="form-control" name="name"></td>
        </tr>

        <tr>
            <td>Movie Actor:</td>  
            <td><input type="text" class="form-control" name="actor"></td>
        </tr>
         <tr>
            <td>Movie Price:</td>  
            <td><input type="number" class="form-control" name="price"></td>
        </tr>
        <tr>
            <td>File Upload </td>  
            <td><input type="file" name="file" id="file"></td>
        </tr>
        <tr>
            <td></td>  
            <td><button type="submit" class="btn btn-primary">Submit</button></td>
        </tr>

      </table>
      
          
    </form> 
  @endif


  </div>
</div>


<br>
<br>
<br>

 <div class="row">
  <div class="col-md-12">   
        
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Movie Name</th>
        <th>Actor</th>
        <th>Price</th>
        <th>Email</th>
        <td>View File</td>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>

    <tbody>
      @if($movies)
      @foreach($movies as $row)
      <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->actor}}</td>
         <td>{{$row->price}}</td>
         <td>{{$row->email}}</td>
         <td><a href="{{asset($row->file)}}" >Open file</a></td>
        <td><a href="{{action('MoviesController@edit',$row->id)}}">
          <button type="button" class="btn btn-success">Edit</button></a></td>
        <td><form method="post" action="{{action('MoviesController@destroy',$row->id)}}">
    {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" value="Edit">Delete</button>
    </form> </td>

      </tr>

      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
<br>
<br>
<br>

@endsection  

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
