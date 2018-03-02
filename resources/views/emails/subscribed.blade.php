<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>You are now a premium user on Secure Beyond!</title>
  </head>
  <body>
  <h3>Hello {{$user->name}}, thank you for upgrading your account to premium!</h3>
  <p> As a premium user, you can post onlimited articles, and get a nice discount in our future layout and looks store! <p><br.>
  <h3> Your Billing information is: <h3>
  <ul>
    <li><strong>Name:</strong> {{$paymentdetails->fullName}}</li>
    <li><strong>BIC: </strong>{{$paymentdetails->BIC}}</li>
    <li><strong>IBAN:</strong> {{$paymentdetails->IBAN}}</li>
    <li><strong>Country:</strong> {{$paymentdetails->country}}</li>
  <ul>
    <p> we hope you will enjoy your time on our platform,but if you ever need to downgrade your account, you can do so via the settings menu. </p>
  <br/>
  <p> much love, the secure beyond team </p>
  </body>
</html>
