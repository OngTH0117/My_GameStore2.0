@extends('layouts.customerHeader')
@section('content')


    <div clss="container">
        <div class ="trending-wrapper">
            <h3>Search Result</h3>
            @foreach($products as $item)
            <div class="item-searched">
                <a href="detail/{{$item['id']}}">
                    <image class="searched-image" src="{{$item['image']}}">
                    <div class="">
                        <h2>{{$item['productName']}}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

@endsection