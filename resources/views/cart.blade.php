@extends('layouts.customerHeader')
@section('content')

<div class="custom-product">
    <div clss="col-sm-4">
        <div class ="trending-wrapper">
            <h3>Item Cart</h3>
            <form action="/placeOrder" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" href="order">Place Order</button>
            </form>
            @foreach($products as $item)
            <div class="row cart-item cart-list">
                <div class="col-sm-2" style="margin-bottom:10px">
                    <a href="detail/{{$item->id}}">
                        <image class="cart-image" src="{{$item->image}}">
                    </a>
                </div>   
                <div class="col-sm-3" style="margin-top:30px">
                        <div class="">
                            <h5>Item Name: {{$item->productName}}</h5>
                            <h5>Console  : {{$item->console}}</h5>
                            <h5>Price(RM)  : {{$item->price}}</h5>
                        </div>
                </div> 
                <div class="col-sm-3" style="margin-top:30px">
                   <a href="/removeCart/{{$item->cartId}}" class="btn btn-warning">Remove from Cart</a>
                </div>       
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection