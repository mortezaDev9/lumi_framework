@extends('layouts.master')

@section('title')
    User
@endsection

@section('content')
    {{ $user->username }}
@endsection