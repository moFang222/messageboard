<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style1.css">
</head>
<body>
  <div class="container">
  <form class="form-signin" action="login" method="POST">
      {{ csrf_field() }}
      <h2 class="form-signin-heading">Please sign in</h2>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email" value="{{ old('email') }}">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" value="{{ old('password') }}">
      <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me" name="remember-me"
           checked="{{ old('remember-me')}} ? checked :　'' "> 
           Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    @if(count($errors))
    <div>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </div>
    @endif
  </div> <!-- /container -->
</body>
</html>