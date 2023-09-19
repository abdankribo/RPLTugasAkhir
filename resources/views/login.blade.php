<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login |</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <section>
      <div class="box-form text-center p-3  border border-secondary-subtle rounded-3 ">
        <h1 class="mb-5">LOGIN</h1>
        <form action="{{ route('login.action') }}" method="post">
          @csrf
          <div class="row mb-5 m-4 text-start ">
            <div class="input-box ">
              <label for="inputEmail3" class="col-sm-2">Email</label>
              @if ($errors->any())
                  @foreach ($errors->all() as $err)
                      <p class="alert alert-danger">{{$err}}</p>
                  @endforeach
              @endif
              <input type="email" class="" id="inputEmail3" value="{{old('email')}}" name="email">
            </div>
          </div>
          <div class="row mb-3 m-4 text-start">
            <div class="input-box ">
              <label for="inputPassword3" class="col-sm-2">Password</label>
              <input type="password" class="" id="inputPassword3" name="password">
            </div> 
          </div>
          <button type="submit" class="btn mt-4 btn-light">Log in</button>
          <div class="mt-4">
            <p>Don't have a account <a href="#">Register</a></p>
          </div>
        </form>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>