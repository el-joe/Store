@extends('site.layout.master')

@section('content')

<form action="{{route('site.cartStore')}}" method="post" class="container">
    @csrf
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" class="form-control" id="address" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="Save Cart"  class="btn btn-info">
</form>

@endsection