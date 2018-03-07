
@extends ('layouts.create')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col"style="margin-top:1rem">

        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Add a custom category</h3>
          </div>
          <div class="card-body">
            <form action="/posts/create/category" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="category" required>

              </div>

              <button type="submit" class="btn btn-success">Add category</button>
            </form>
          </div>
        </div>


      </div>
      <div class="col-4" style="margin-top:1rem">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">existing categories</h3>
          </div>
          <div class="card-body"style="max-height:500px;overflow:hidden">

            <div class="container" style='width:100%;height:100%;overflow-y:auto;padding-right:17px;'>
            <ul class="list-group list-group-flush">
              @foreach ($categories as $category)
                  <li class="list-group-item">{{$category->name}}</li>
             @endforeach
            </ul>

        </div>


          </div>
        </div>


    </div>
  </div>






@endsection
