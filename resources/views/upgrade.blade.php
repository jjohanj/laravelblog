<<<<<<< HEAD
<h2> Monthly plan: <h2>
<p> unlimited posts and custom themes, for $4,99/month </p>

<form action="/upgradesubscription" method="POST">
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
=======
@extends ('layout')

@section ('content')

<a href="/settings">back to settings</a>

<h2> unlimited posts, for just $9,99. <h2>



<form action="/upgradesubscription" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Username
    </label> <br/>
      <input placeholder="Your username" name="Name" type="text" id="name" ></br>

      <label for="card-element">
        Name Cardholder
      </label><br/>
        <input placeholder="Cardholder name" name="CardName" type="text" id="Cardname" ></br>

    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display Element errors. -->
    <div id="card-errors" role="alert"></div>

    </div>

  <button>PAY UP</button>
    {{ csrf_field() }}
</form>







@endsection

@section ('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ URL::to('js/upgrade.js') }}"></script>

@endsection
>>>>>>> 197cac121c58e31b785aa133495de658041caf41
