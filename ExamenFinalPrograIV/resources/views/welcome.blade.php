@include('layouts.header')
@extends('layouts.footer')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            Examen Final - Fiorella Rodriguez, Alessandro Maninchedda, Antonio Gutierrez
        </title>
    </head>
    <body>      
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt="First slide" src="images/1.png" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Second slide" src="images/2.png" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Third slide" src="images/3.png" data-holder-rendered="true">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </body>
</html>

