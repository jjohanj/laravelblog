

@extends ('layout')

@section ('content')

<a href="/">Home</a>

<h2> Monthly plan: <h2>
<p> unlimited posts and custom themes, for $4,99/month </p>


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

  <button>Submit Payment</button>
    {{ csrf_field() }}

</form>





@endsection

@section ('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ URL::to('js/upgrade.js') }}"></script>

@endsection
