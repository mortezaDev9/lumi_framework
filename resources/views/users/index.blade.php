@extends('layouts.master')

@section('title')
    Users
@endsection

@section('content')
    @foreach ($users as $user)
        {{ $user->username }}
    @endforeach
@endsection