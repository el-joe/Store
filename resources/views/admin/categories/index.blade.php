@extends('admin.layout.master')
@section('title', 'Categories')

@section('content')
@if (session('success'))
<div class="alert alert-success text-center">{{session('success')}}</div>
@endif
<a href="{{route('dashboard.categories.create')}}" class="btn btn-success">Create New</a>
<table class="table">
    <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">image</th>
        <th scope="col">Ops</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><img src="{{$category->avatar}}" alt="-" width="70" height="70"></td>
                <td>
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('dashboard.categories.destroy',$category->id)}}" class="btn btn-danger deleteBtn">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {!! $categories->links() !!}
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