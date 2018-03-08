@extends ('layouts.info')

@section ('content')
  @include ('layouts.errors')
  <div class="container">
  <div class="card" style="margin-top:1rem">
    <div class="card-header" style="text-align:center">
      <h3 class="card-title">Upgrade to Premium</h3>
      <h4 class="card-subtitle mb-2 text-muted">Please fill in your billing information</h4>
    </div>
    <div class="card-body">
      <div class="container" style="width:50%">
      <form action="/paymentdetails" method="POST" >
        {{ csrf_field() }}

        <div class="form-group">
          <label for="fullName">Full name:</label>
          <input class="form-control" id="fullName" name="fullName" required>
        </div>



        <div class="form-group">
          <label for="BIC">BIC:</label>
          <input class="form-control" id="BIC" name="BIC" required>
        </div>

        <div class="form-group">
          <label for="IBAN">IBAN:</label>
          <input class="form-control" id="IBAN"name="IBAN" required>
        </div>

        <div class="form-group">
          <label for="Country">Country:</label>
          <input class="form-control" id="Country" name="Country" required>
        </div>


        <div class="form-group">

                <button type="submit" class="btn btn-success">Yes, I want to subscribe for 4,99/month!</button>
                <small id="paymenttimer" class="form-text text-muted">You will get a monthly payment notification.</small>

            </div>
</div>
          </form>
    </div>
  </div>
</div>
@endsection
