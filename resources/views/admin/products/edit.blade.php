@extends('admin.layout.master')

@section('title', 'Update User')

@section('content')
    <form action="{{route('dashboard.products.update',$id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products.form')
    </form>
@endsection