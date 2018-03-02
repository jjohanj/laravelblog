@extends ('layout')

@section ('content')

<a href="/settings">back to settings</a>
<div>
<h2> Step 1: please fill in your billing information: </h2>
<p> You will get a monthly payment notification </p>

<form action="/paymentdetails" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="fullName">Full name:</label>
    <input id="fullName" name="fullName" required>
  </div>

  <div class="form-group">
    <label for="BIC">BIC:</label>
    <input id="BIC" name="BIC" required>
  </div>

  <div class="form-group">
    <label for="IBAN">IBAN:</label>
    <input id="IBAN"name="IBAN" required>
  </div>

  <div class="form-group">
    <label for="Country">Country:</label>
    <input id="Country" name="Country" required>
  </div>


  <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">Yes, I want to subscribe for 4,99/month!</button>
        </div>
      </div>

    </form>

</div>
@endsection
