@extends('master')
@section('content')

        <div class="container-fluid mx-3 my-4">
            @if($items->count() > 0)
                <?php $total = 0; ?>
                @foreach ($items as $item)
                    <?php $total += $item->price; ?>
                    <div class="border rounded w-75 row my-2">
                        <div class="col-4 pl-5" style="height: 200px; width: 200px">
                            <img src="{{ $item->gallary }}" height="150px" width="150px" class="my-4"/>
                        </div>
                        <div class="col mt-5">
                            <h4> {{ $item->product_name }} </h4>
                            <h6> &#8377; {{ $item->price }} </h6>
                            <div class="row">
                                <div class="col-4">
                                    <form method="post" action="{{ route('remove-cart-product') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button type="submit" class="btn btn-outline-primary">Remove from cart</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form method="post" action="{{ route('buy-cart-product') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button type="submit" class="btn btn-outline-info w-75">Buy</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col mt-5 border rounded w-75">
                    <div class="row ml-5 py-5" style="height: 150px;">
                        <div class="col-3">
                            <h4 class="d-inline"> Cart total: </h4>
                            <p class="d-inline mx-2 lead"> {{$total}} </p>
                        </div>
                        <div class="col">
                            <form method="post" action="{{ route('buy-cart-product') }}">
                                @csrf
                                <input type="hidden" name="buy_all" value="true">
                                <button type="submit" class="btn btn-outline-info w-25">Buy All</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <h3>Nothing found in cart.</h3>     
            @endif
        </div>
    
@endsection