<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>money transfer</title>
  <!-- Bootstrap core CSS-->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>



 <!--<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/intel/build/css/intlTelInput.css')}}">
  <link rel="stylesheet" href="{{URL::asset('/intel/build/css/demo.css')}}">



  <!-- Custom styles for this template-->
  <link href="/css/sb-admin.css" rel="stylesheet">

  <style type="text/css">
    .intl-tel-input {
  position: relative;
  display: inline-block; 
  width: 100%;
}
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Money Transfer</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Send Money">
          <a class="nav-link" href="{{URL('/old')}}"">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Send Money</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Accounts">
          <a class="nav-link" href="{{URL('/account')}}">
            <i class="fa fa-fw fa-address-book-o"></i>
            <span class="nav-link-text">Manage Accounts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contact List">
          <a class="nav-link" href="{{URL('/contacts')}}">
            <i class="fa fa-fw  fa-address-book"></i>
            <span class="nav-link-text">Contact List</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transactions">
          <a class="nav-link" href="{{URL('/transactions')}}">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Transactions</span>
          </a>
        </li>
        
        
        
       
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
     
        
      </div>
      <!-- Example DataTables Card-->

      @yield('content');



      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout"  to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->

    
  <script src="{{URL::asset('/intel/build/js/intlTelInput.js')}}"></script>
  <script>
    $("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off", // dropdownContainer: "body", 
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
       geoIpLookup: function(callback) {
         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      onlyCountries: ['ug', 'ke', 'rw'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

    $("button").click(function(){
    
    
}); 

    $("#phone").blur(function(){
    var countryData = $("#phone").intlTelInput("getSelectedCountryData");
    document.getElementById("country").value = countryData.name;
   
});


    $("#account_number4").blur(function(){
    
   $("#owners_account").show();
});


$("#account_number5").blur(function(){
    
   $("#owners_account").show();
});


$("#reg_user_nam").blur(function(){
  $("#owners_account").show();
   
   
});


$("account_number").blur(function(){
 
    $("#owners_account").show();
   
});

    $(".account_type").change(function(){

    });

    $( "#tab_receiver_bank" ).click(function() {

$(".senderbk").hide();
   $(".sendermm").hide();
  $(".receiver_mm").hide();
 
    $(".receiver_bk").show();
     $("#owners_account").show();
     $(".option_r_a_type").hide();

     $(".existing_account").show();
 
  document.getElementById("raccount_type").value = "bank_account";
  
});


    $( "#tab_receiver_mm" ).click(function() {
    

  $(".senderbk").hide();
   $(".sendermm").hide();
  $(".receiver_bk").hide();
  
  $(".receiver_mm").show();
  $("#owners_account").show();
  $(".option_r_a_type").hide();
  $(".existing_account").show();
   
 
  document.getElementById("raccount_type").value = "mobile_money";
  
});

     $( ".old_rec_mm" ).click(function() {
    
   
 $(".sendbtn").show();
  document.getElementById("raccount_type").value = "mobile_money";
  
});

        $( ".old_rec_bb" ).click(function() {
    
   
 $(".sendbtn").show();
  document.getElementById("raccount_type").value = "bank_account";
  
});


   $(".account_type").change(function(){

    });

    $("#tab_sender_mm").click(function() {
$(".senderbk").hide();
$(".sendermm").show();
   
 
  document.getElementById("saccount_type").value = "mobile_money";
  
});


    $("#tab_sender_bank").click(function() {
   $(".sendermm").hide();
   $(".senderbk").show();

   
 
  document.getElementById("saccount_type").value = "bank_account";
  
});

$( document ).ready(function() {

  $(".receiver_bk").hide();
  $("#owners_account").hide();
  $(".receiver_mm").hide();
  $(".senderbk").hide();
   $(".sendermm").hide();
    $(".sendbtn").hide();
    $(".receiver_select").hide();
});


$("#phone").blur(function(){
    var countryData = $("#phone").intlTelInput("getSelectedCountryData");
    document.getElementById("country").value = countryData.name;
   
});


$("#account_number4").blur(function(){
  
      
    var countryData = $("#phone").intlTelInput("getSelectedCountryData");
    document.getElementById("country").value = countryData.name;
   
});
$("#sendbk3").blur(function(){
    $("#owners_account").show();
   
});


$("#account_number1").blur(function(){
    $("#owners_account").show();
   
});


 $('#contacts_id').change(function(){
  
 var contact_id = $( "#contacts_id" ).val();

   
 if(contact_id==""){
   $(".sendbtn").hide();
  }
  else if(contact_id=="new")
  {

    $(".sendbtn").hide();
   $(".receiver_select").show();
   $(".existing_account").hide();
    $(".receiver_acc_select").hide();
  }
  else{
    $(".receiver_select").show();
    $(".sendbtn").hide();
   $(".receiver_select").hide();
   $(".existing_account").show();
    $(".receiver_acc_select").show();
    $(".receiver_mm").hide();
    $(".receiver_bk").hide();
    
   
  
      $.ajax({
        url: "old1",
        type: "get", //send it through get method
        data: { 
          contact_id:contact_id
        },
        success: function(response,status) {

          document.getElementById("receivers_account").innerHTML = response;   
        },
        error: function(xhr) {
          alert("Data: " + xhr );
        }
      });
    }
 });



  $('#receivers_account').change(function(){
  
 var account_id = $( "#receivers_account" ).val();
 alert("The account is"+account_id);
  if(account_id==""){
    alert("The account is nan"+account_id);
   $(".sendbtn").hide();
  }
  else if(account_id=="new")
  {

   $(".receiver_select").show();
   $(".existing_account").hide();
    $(".receiver_acc_select").hide();
     
  }
  else{
    alert("The account is old"+account_id);
    $(".old_receiver").show();
    $(".sendbtn").show();
   
  }

      
 });

  </script>
</body>

</html>
   
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>

