@extends('layouts.customerHeader')
@section('content')

<div clss="container">
        <div class ="trending-wrapper">
            <h3>All Nintendo Switch Games</h3>
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

@endsection