@extends('site.layout.master')

@section('content')
@if (count($cart['items']) > 0)
<table class="table table-primary" style="margin-top:50px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Ops</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cart['items'] as $item)
            <tr>
                <th scope="row">{{$item['object']->name}}</th>
                <td>{{$item['qty']}}</td>
                <td>{{$item['object']['price']}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('site.addToCart',$item['object']['id'])}}">+</button>
                    <a class="btn btn-danger" href="{{route('site.decreaseQty',$item['object']['id'])}}">-</button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <div class="row alert alert-success">
      <div class="col-sm-4">
          <span>Total Price : <b>{{$cart['total_price']}} $</b></span>
      </div>
    <div class="col-sm-8">
        <a href="{{route('site.cartConfirmation')}}" class="btn btn-success">Next</a>
    </div>
  </div>

  @else
  <h1 class="text-center alert alert-warning">Cart Is Empty Please Add <a href="/">Products</a> To Cart</h1>
@endif

@endsection