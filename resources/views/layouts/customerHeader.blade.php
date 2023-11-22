<?php
use App\Http\Controllers\CustomerController;
$total= CustomerController::cartItem();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>My Game Store</title>
</head>

<body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">My GameStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/customerHome">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pcGames">PC Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/psGames">PS5 Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/nintendoGames">Nintendo Switch Games</a>
                </li>
                <form class="form-inline my-2 my-lg-0" style="margin-left:10px;" action="/search">
                    <input name="query" style="width:300px"class="form-control mr-sm-2" type="search" placeholder="Search Game" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto">
            <li>
                    <a class="nav-link" href="/cart">Cart({{$total}})</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item dropdown" style="margin-right:50px;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::guard('web')->check())
                        Hi {{Auth::guard('web')->user()->name}}
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    @yield("content")
    @yield("footercontent")
   
</body>



<style>
    .custom-container{
        height:700px;
    }
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    img.slider-img {
        height: 650px !important;
        width: 1350px !important;
        margin-left: 95px;
    }

    .trending-image {

        height: 230px;
        width: 170px;
    }

    .trending-item {
        float: left;
        margin-left: 20px;
    }

    .trending-wrapper {
        margin: 30px;
    }

    .detail-img {
        height: 350px;
        width: 280px;
        margin: 50px;
    }
    .item-searched{
        float: left;
        margin-top:20px;
        margin-left:15px;
    }
    .searched-image{
        height: 300px;
        width: 230px;
    }
    .cart-list{
        border-bottom: 1px solid grey;
        margin-top: 10px;  
    }
    .cart-image{
        height: 200px;
        width: 160px;
    }
</style>

</html>
