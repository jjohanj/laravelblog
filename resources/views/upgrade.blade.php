<h2> Monthly plan: <h2>
<p> unlimited posts and custom themes, for $4,99/month </p>

<form action="/upgrade" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
  Please enter your credentials <br/>
    <input placeholder="Your name" name="Name" type="text" id="name" ></br>

    payment method: <br/>

    <input placeholder="paypal email" name="paypal" type="text" id="paypal" ></br>
    <input placeholder="creditcard" name="creditcard" type="text" id="creditcard" ></br>
    <input type='hidden' value='no' name='agree'><br/>
    <input type='checkbox' value='yes' name='agree'> I want to upgrade my account <br/>
    <button class="btn btn-primary" type="submit">Upgrade my account!</button></br>

</form>
