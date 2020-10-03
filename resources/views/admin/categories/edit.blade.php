@extends('admin.layout.master')

@section('title', 'Update User')

@section('content')
    <form action="{{route('dashboard.categories.update',$id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.categories.form')
    </form>
@endsection