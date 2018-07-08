<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="contacts_id" id="contacts_id" class="form-control input-lg dynamic" data-dependent="accounts">
     <option value="">Select Receiver</option>
     @foreach($country_list as $users)
     <option value="{{ $users->id}}">{{ $users->fname.$users->lname}}</option>
     @endforeach
    </select>



   </div>
   <br />
   <div class="form-group">
    <select name="accounts_id" id="accounts_id" class="form-control input-lg dynamic" data-dependent="">
     <option value="">Select Account</option>
    </select>
   </div>
   <br />
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){



 $('#my_select').change(function(){
  

$.get("old1", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);


        for (x in data) {
    alert(data[x]);
} 
    });

 });




$.ajax({
  url: "old1",
  type: "get", //send it through get method
  data: { 
    ajaxid: 4, 
    UserID: 12, 
    EmailAddress: 'okellojoel@gmial.com'
  },
  success: function(response,status) {
    alert("Data hhhh: " + response + "\nStatus: " + status);
    document.getElementById("accounts_id").innerHTML = response; 
    alert("DOne");

    
  },
  error: function(xhr) {
    alert("Data: " + xhr + "\nStatus: ");
  }
});









});
 
</script>


