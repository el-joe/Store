@extends('admin.layout.master')

@section('title', 'Create User')

@section('content')
    <form action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
        @include('admin.categories.form')
    </form>
@endsection