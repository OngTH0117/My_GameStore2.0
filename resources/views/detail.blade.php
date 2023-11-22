@extends('layouts.customerHeader')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{$product['image']}}" alt="">
            </div>
            <div class="col-sm-6" style="margin-top:50px">
                <div style="margin-top:30px">
                    <h2>{{$product['productName']}}</h2>
                    <h3>Price(RM):{{$product['price']}}</h3>
                    <h3>Console &nbsp; :{{$product['console']}}</h3>
                    <br><br>
                    <form action="/addCart" method="POST">
                        @csrf
                        <input type="hidden" name="productId" value={{$product['id']}}>
                    <button class="btn btn-primary">Add to Cart</button>
                    </form>

                    <br><br>
                </div>
            </div>
        </div>
    </div>

@endsection