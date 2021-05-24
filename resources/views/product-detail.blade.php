@extends('master')
@section('content')
    <div class="container-fluid my-4">
        <div class="row mt-5">
            <div class="col-4 border-right">
                <img src="{{ $product->gallary}}" alt="" height="400px" width="400px">
            </div>
            <div class="col-8 pl-5">
                <a href="/">Go Back</a>
                <div class="my-4 pl-3">
                    <h2>{{ $product->product_name }}</h2>
                    <h5>Product Description: </h5><p class="ml-5">{{ $product->description }}</p>
                    <h4>Price: {{ $product->price }}</h4>
                    <div class="row mt-4">
                        <form action="{{ route('buy-cart-product') }}" method="post" class="col-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-outline-primary w-100" type="submit">buy</button>
                        </form>
                        <form action="{{ route('add_to_cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-outline-dark w-100" type="submit">add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection