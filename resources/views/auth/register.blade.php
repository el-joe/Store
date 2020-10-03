@extends('site.layout.master')

@section('content')

<form action="{{route('registerPost')}}" method="post" class="row container">
    @csrf
        @if(isset($errors) && count($errors->all()) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    <input type="hidden" name="redirect_url" value="{{request('redirect_url')}}">

    <div class="form-group col-sm-6">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">    
    </div> 
    <div class="form-group col-sm-6">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">    
    </div> 
    <div class="form-group col-sm-6">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">    
    </div>
    <div class="form-group col-sm-6">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">    
    </div>
    {{--  <input type="hidden" name="type" value="client">  --}}
    <input type="submit" value="Register" class="btn btn-info">
</form>

@endsection