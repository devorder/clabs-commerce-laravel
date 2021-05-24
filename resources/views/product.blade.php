@extends('master')
@section('content')
    {{-- slider starts --}}
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 400px">
            @foreach ($products as $product)
                <div class="carousel-item {{ $product['id'] == 1 ? 'active' : ''}}">
                    <a href="product/{{$product['id']}}">
                        <img src="{{ $product->gallary }}" alt="{{ $product->product_name }}" height="400px">
                        <div class="carousel-caption d-none d-md-block bg-secondary">
                            <h5>{{ $product->product_name }}</h5>
                            <p>{{ $product->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
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
    {{-- slider ends --}}

    {{-- trending products starts --}}
    <div class="my-4 pt-5">
        <h3 class="p-4">Trending Products</h3>
        <div class="row text-center">
            @foreach ($products->take(4) as $product)
                <div class="col-3 text-center">
                    <a href="product/{{$product['id']}}" class="text-decoration-none text-dark">
                        <img src="{{ $product->gallary }}" alt="{{ $product->product_name }}" height="200px" class="mr-2">
                        <h5 class="py-4 h3">{{ $product->product_name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- trending products ends --}}
@endsection