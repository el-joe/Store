@extends('admin.layout.master')

@section('title', 'Cart '.$cart->id)

@section('content')

<div class="card text-white bg-primary col-sm-12">
    <div class="card-header">{{$cart->user->name}}</div>
    <div class="card-body">
      <h5 class="card-title">{{$cart->total_price}} $</h5>
      <p class="card-text">{{$cart->address}}</p>
    </div>
  </div>

<hr>
<h2 class="text-center">Items</h2>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
        <th scope="col">QTY</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cart->items as $item)
        <tr>
            <th scope="row">#{{$item->id}}</th>
            <td>{{$item->product->name}}</td>
            <td>
                <img src="{{$item->product->avatar}}" alt="-" height="100" width="100">
            </td>
            <td>{{$item->price}}</td>
            <td>{{$item->qty}}</td>
          </tr>    
        @endforeach
    </tbody>
  </table>
  
@endsection