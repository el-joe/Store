@extends('admin.layout.master')
@section('title', 'Products')

@section('content')
@if (session('success'))
<div class="alert alert-success text-center">{{session('success')}}</div>
@endif
<a href="{{route('dashboard.products.create')}}" class="btn btn-success">Create New</a>
<table class="table">
    <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Ops</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td><img src="{{$product->avatar}}" alt="-" width="70" height="70"></td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('dashboard.products.destroy',$product->id)}}" class="btn btn-danger deleteBtn">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {!! $products->links() !!}
@endsection

@section('scripts')
  <script>
    $('.deleteBtn').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url,
            method : 'POST',
            data : {_method: 'DELETE',_token:'{{csrf_token()}}'},
            success : function(){
                location.reload();
            }
        });
    });
  </script>
@endsection