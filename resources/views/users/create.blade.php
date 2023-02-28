@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('content')
    <div class="container">
		  <h2>User Sign In</h2>
		  <form action="/user/store" method="POST">
		      <label for="username">Username:</label>
			    <input type="text" id="username" name="username" placeholder="Enter your username">
			    
			    <label for="email">Email:</label>
			    <input type="email" id="email" name="email" placeholder="Enter your email">

			    <label for="password">Password:</label>
			    <input type="password" id="password" name="password" placeholder="Enter your password">

			    <button type="submit">Sign In</button>
		  </form>
	</div>
@endsection