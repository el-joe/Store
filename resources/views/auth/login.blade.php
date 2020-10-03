<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container h-100">
        <form method="post" action="{{route('loginPost')}}">
            <input type="hidden" name="redirect_url" value="{{request('redirect_url')}}">
            @if(isset($errors) && count($errors->all()) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
                @csrf
            <div class="col-sm-4 offset-sm-4" style="margin-top:50px">
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary col-sm-12">Login</button>
                <br>
                <br>
                <p class="text-center">
                <a href="register{{request('redirect_url') ? '?redirect_url='.request('redirect_url') : ''}}" class="text-center">Register</a>
                </p>
            
            </div>
        </form>
    </div>
</body>
</html>