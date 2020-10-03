@extends('admin.layout.master')

@section('title', 'Create User')

@section('content')
    <form action="{{route('dashboard.users.store')}}" method="post">
        @include('admin.users.form')
    </form>
@endsection