@extends('layouts.footer')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AAF GALLERIA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 80vh;
                margin: 0;
            }

            .full-height {
                height: 80vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>          
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    AAF GALLERIA                    
                </div>



                <div class="links"> 
                    @if (Route::has('login'))
                    @auth              
                    <a href="{{ url('/shop1') }}" class="btn btn-primary">Go to Checkout</a>
                    @else
                    <strong>Login / Register to proceed with your checkout</strong><br><br>
                    <a href="{{ url('loginUserAuth') }}">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ url('registerUser') }}">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
