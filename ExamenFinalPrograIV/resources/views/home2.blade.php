@extends('layouts.app')

<style>
    .card-body > a {
        color: #636b6f;
        padding-right: 20px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h2 class="display-3">You are on our list now!</h2>
                    <p class="lead"><strong>Please check your email</strong></p>
                </div>

                <div class="card-body"> 
                    @if (Route::has('login'))
                    @auth              
                    <a href="{{ url('/shop1') }}" class="btn btn-primary">Go to Checkout</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

