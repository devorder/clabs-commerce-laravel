@extends('master')
@section('content')
    <div class="col-12">
        <div class="my-4 pt-5">
            @if ($results->count() > 0)
                <h2>Search results:</h2>
                @foreach ($results as $result)
                <a href="product/{{ $result->id }}" class="text-decoration-none text-dark">
                    <div class="border rounded row w-75" style="height: 150px">
                        <div class="col-3 border-right px-5 my-4">
                            <img src="{{ $result->gallary }}" height="100px" width="100px"/> 
                        </div>
                        <div class="col-8 my-4 px-5">
                            <h4>{{ $result->product_name}}</h4>
                            <div class="d-block">
                                <h5 class="d-inline">Price: </h5>
                                <p class="d-inline">{{ $result->price}}</p>
                            </div>
                            <div class="d-block">
                                <h5 class="d-inline">Description: </h5>
                                <p class="d-inline">{{ Str::of($result->description)->words(10, '...') }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            @else
                <h2>Nothing matching found.</h2>     
            @endif
        </div>

    </div>
@endsection