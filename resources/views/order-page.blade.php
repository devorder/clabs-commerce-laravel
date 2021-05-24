@extends('master')
@section('content')

        @if ($products)
            @php
                $delivery_charges = 40;
                $total = 0;
            @endphp
            <div class="container-fluid my-4">
                <div class="row">
                    <div class="col-6">
                        <table>
                            @foreach ($products as $product)
                                @php
                                    $total += $product->price;
                                @endphp
                                <tr>
                                    <td>
                                        <div>
                                            <h5> {{$product->product_name}} </h5>
                                            <p class="ml-2"> {{$product->description}} </p>
                                        </div>
                                    </td>
                                    <td class="px-5">
                                        <h5> &#8377; {{$product->price}} </h5>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-top">
                                <td class="pt-4">
                                    <p>Price</p>
                                    <p>Delivery Charges</p>
                                    <h5>Amount Payable</h5>
                                </td>
                                <td class="px-5 pt-4">
                                    <p> &#8377; {{ $total }}</p>
                                    <p> &#8377; {{ $delivery_charges }}</p>
                                    <h5> &#8377; {{ $total + $delivery_charges }}</h5>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="container">
                            <div class="row justify-content-center">
                                <form action="{{route('pay')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{$total + $delivery_charges}}">
                                      <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputAddress2">Address 2</label>
                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputCity">City</label>
                                          <input type="text" class="form-control" id="inputCity" name="city">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputZip">Zip</label>
                                          <input type="text" class="form-control" id="inputZip" name="zip">
                                        </div>
                                        <div class="form-group">
                                            <p>Payment method</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">Internet Banking</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Debit/Credit card</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio3" value="option3">
                                                <label class="form-check-label" for="inlineRadio3">Pay on delivery</label>
                                            </div>
                                        </div>
                                      </div>
                                    <button type="submit" class="btn btn-primary w-50 mx-auto">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <script>
                window.location.href = '/';
            </script>
        @endif

@endsection