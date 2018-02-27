
<div class="col-sm-8">

    @include ('layouts.errors')

    <form method="post" action="/profile/image">
    {{csrf_field()}}

    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group">
      <label for="email">Set Your Blog's Header Image (it will be set to 150x150)</label>
      <input id="image" type="text"
        class="form-control"
        name="blogimage" placeholder="Example: 'clipart-library.com/images/8cAbXKoXi.png'" required>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Set Image</button>
          </div>
        </div>
      </form>
  </div>
