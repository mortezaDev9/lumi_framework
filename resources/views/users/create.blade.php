@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('css')
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: sans-serif;
        }

        h2 {
            margin-bottom: 20px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        input[type="text"], input[type="password"], input[type="email"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            width: 100%;
            font-size: 1.1rem;
        }
        
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        
        button[type="submit"]:hover {
            background-color: #34495e;
        }

    </style>
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

@section('js')
    <script>
        const form = document.querySelector('form');

        form.addEventListener('submit', (event) => {
        	event.preventDefault();
        
        	const email = document.querySelector('#email').value;
        	const password = document.querySelector('#password').value;
        
        	// Validate email and password
        	if (email === '' || password === '') {
        		alert('Please fill in all fields');
        	} else {
        		// Submit form
        		form.submit();
        	}
        });
    </script>
@endsection