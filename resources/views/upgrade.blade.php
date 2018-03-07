@extends ('layout')

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading"><h2>Your payment notification is on the way <h2>
    <h2> <small>Can't wait? enter your creditcard details below, and start continue blogging right now!</small> </h2></div>
  <div class="panel-body">


    <form action="/upgradesubscription" method="post" id="payment-form">
      <div class="form-group">
        <label for="name"> Username</label>
          <input class="form-control" placeholder="Your username" name="Name" type="text" id="name" ></br>

          <label for="Cardname">Name Cardholder</label>
            <input class="form-control" placeholder="Cardholder name" name="CardName" type="text" id="Cardname" ></br>

        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>

        </div>

      <button class="btn btn-success">Complete payment</button>
        {{ csrf_field() }}
    </form>


  </div>
</div>




@endsection

@section ('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ URL::to('js/upgrade.js') }}"></script>

@endsection
