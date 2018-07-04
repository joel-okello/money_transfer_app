<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>International Telephone Input</title>
  <link rel="stylesheet" href="{{URL::asset('/intel/build/css/intlTelInput.css')}}">
  <link rel="stylesheet" href="{{URL::asset('/intel/build/css/demo.css')}}">
</head>

<body>
  <h1>International Telephone Input</h1>
  <form>
    <input id="phone" type="tel">
    <button type="submit">Submit</button>
  </form>

  <!-- Load jQuery from CDN so can run demo immediately -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{URL::asset('/intel/build/js/intlTelInput.js')}}"></script>
  <script>
    $("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
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
      //onlyCountries: ['ug', 'ke', 'rw'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

    $("button").click(function(){
    alert(document.getElementById("phone").value);
    var countryData = $("#phone").intlTelInput("getSelectedCountryData");
    alert(countryData.name);
}); 
    function myfuction(countryCode)
    {
      alert(countryCode)

    }
  </script>
</body>

</html>