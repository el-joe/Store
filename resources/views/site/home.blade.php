@extends('site.layout.master')

@section('content')
<div class="row container"  style="padding-top : 30px">
    <div class="col-sm-3">
        <h4>- Categories</h4>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{request()->url().'?cat='.$category->slug}}">{{$category->name}}</a>
                </li>
            @endforeach
            <li>
                <a href="/">All</a>
            </li>
        </ul>
    </div>
    <div class="col-sm-9">
        <div class="row">
            @foreach ($products as $product)
            <div class="card col-sm-4">
                <img class="card-img-top" height="200" width="200" src="{{$product->avatar}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{route('site.singlePage',$product->id)}}">{{$product->name}}</a>
                    </h5>
                    <p class="card-text">{{Illuminate\Support\Str::limit($product->description,25)}}</p>
                    <div>
                        <a href="{{route('site.addToCart',$product->id)}}" class="btn btn-primary">Add To Cart</a>
                        <p class="float-right" style="padding-top:5px">{{$product->price}} $</p>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection