@extends('layouts.customerHeader')
@section('content')

<body>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="slider-img"
                    src="https://i.pinimg.com/originals/32/4c/e2/324ce26a7f7a880483bf7bc12574d6f0.jpg">
                <div class="carousel-caption">
                    <h3>DarkSiders II</h3>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="slider-img"
                    src="https://images.hdqwalls.com/download/assassins-creed-valhalla-game-by-1920x1080.jpg">
                <div class="carousel-caption">
                    <h3>Assassin's Creed Valhalla</h3>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="slider-img" src="https://wallpaperaccess.com/full/185915.jpg">
                <div class="carousel-caption">
                    <h3>Crysis</h3>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="slider-img"
                    src="https://i.pinimg.com/originals/70/78/30/70783095fdc82d2d20d85ff89407c1fe.jpg">
                <div class="carousel-caption">
                    <h3>Halo</h3>
                </div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div clss="container custom-container" style="margin-left:70px">
        <div class="trending-wrapper">
            <h3>All Games</h3>
            @foreach($products as $item)
            <div class="trending-item" style="margin-top:20px">
                <a href="detail/{{$item['id']}}">
                    <image class="trending-image" src="{{$item['image']}}">
                        <div style="text-align: center;">
                            <h5>{{$item['productName']}}</h5>
                        </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection

