<h2> Cancel your subscription <h2>
<p> Are you sure? </p>

<form action="/cancelsubscription" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
  Please enter your credentials <br/>
    <input placeholder="Your name" name="Name" type="text" id="name" ></br>

    payment method: <br/>

    <input placeholder="paypal email" name="paypal" type="text" id="paypal" ></br>
    <input placeholder="creditcard" name="creditcard" type="text" id="creditcard" ></br>
    <input type='hidden' value='no' name='agree'><br/>

    <button class="btn btn-primary" type="submit">Cancel my subscription!</button></br>

</form>
