
@extends('layouts.template')
@section('content')




<script type="text/javascript">
    

    var obj = <?php echo json_encode($accounts); ?>;
    
    for(var i = 0;i<obj.length<i++)
    {
       alert(obj[i]) ;
    }
 
</script>
        
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
          <i class="fa fa-table"></i>Your Accounts</div> 
          <div class='right-button-margin'>
            <br>
           <a href="{{url('account_edit')}}" class='btn btn-success pull-right'>Create New Account</a>
           <br
         </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Account Name</th>
                  <th>Account Type</th>
                  <th>Account Number</th>
                  <th>Delete Account</th>
                  <th>Edit Account </th>
                </tr>
              </thead>
              
              <tbody>
                   
      @if($accounts)
      @foreach($accounts as $row)
      <tr>
        <td>{{$row->account_name}}</td>
        <td>{{$row->account_number}}</td>
         <td>{{$row->account_type}}</td>
        <td><a href="{{action('AccountController@edit',$row->id)}}">
          <button type="button" class="btn btn-success">Edit</button></a></td>
        <td><form method="post" action="{{action('AccountController@destroy',$row->id)}}">
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
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endsection