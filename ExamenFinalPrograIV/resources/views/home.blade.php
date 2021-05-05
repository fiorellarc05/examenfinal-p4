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
                <div class="card-body" align='center'>
                    <h2>You are on our list now!</h2>
                    <p class="lead"><strong>Please check your email</strong></p>
                    <a class="btn btn-primary btn-sm" href="{{ url('welcome') }}" role="button">Continue to homepage</a>
                </div>

                <div class="card-body" align='center'> 
                    @if (Route::has('login'))
                    @auth              
                    <h5>You´re an authenticated user</h5>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

