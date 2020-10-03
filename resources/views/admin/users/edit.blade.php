@extends('admin.layout.master')

@section('title', 'Update User')

@section('content')
    <form action="{{route('dashboard.users.update',$id)}}" method="post">
        @method('PUT')
        @include('admin.users.form')
    </form>
@endsection