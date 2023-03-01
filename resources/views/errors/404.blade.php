@extends('layouts.master')

@section('title')
    Page Not Found
@endsection

@section('css')
    <style>
        /* Styles for the main container */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            color: #333;
        }
        
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        
        /* Styles for the 404 message */
        h1 {
            font-size: 6rem;
            margin-top: 3rem;
        }
        
        h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        /* Styles for the back to home button */
        .button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .button:hover {
            background-color: #3e8e41;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>We're sorry, the page you requested could not be found.</p>
        <a href="/" class="button">Back to Home</a>
    </div>
@endsection
