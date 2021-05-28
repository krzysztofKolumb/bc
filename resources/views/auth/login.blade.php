<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('/css/admin.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>
<body>

<div class="container login-container">
   <div class="row form-login-container" style="margin-top:45px">
      <div class="col-md-12">
           <h4>Logowanie</h4>
           <form action="{{ route('auth.check') }}" method="post">
            @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
           @csrf
              <div class="form-group">
                 <label class="col-sm-12 col-form-label">Email</label>
                 <div class="col-sm-12">
                 <input type="text" class="form-control" name="email" placeholder="Wpisz e-mail" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                 </div>
              </div>
              <div class="form-group">
                 <label class="col-sm-12 col-form-label">Hasło</label>
                 <div class="col-sm-12">
                 <input type="password" class="form-control" name="password" placeholder="Wpisz hasło">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
              </div>
              <button type="submit" class="btn btn-block btn-primary col-sm-4">Zaloguj</button>
              <br>
              <!-- <a href="{{ route('auth.register') }}">Utwórz konto</a> -->
              <!-- <a href="{{ route('auth.register') }}">Przypomnij hasło</a> -->
           </form>
      </div>
   </div>
</div>
    
</body>
</html>