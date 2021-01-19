@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    @if (count(Cart::content()))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Tax Rate</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0 @endphp
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->taxRate }}</td>
                                <td>{{ $item->total }}</td>
                                <td><a href="{{ route('remove',  ['rowId' => $item->rowId]) }}">Delete</a></td>
                            </tr>
                            @endforeach
                            <tr style="text-align:center">
                                <td colspan="5"><b style="color:red">Total Tax </b> {{Cart::tax()}} </td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="5"><b style="color:red">Total Discount </b> {{Cart::discount()}} </td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="5"><b style="color:red">Total: </b> {{Cart::subtotal()}} (without tax) </td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="5"><b style="color:red">Grand Total: </b> {{ Cart::total() }} (with tax and discount)</td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="5"><a class="btn btn-danger" href="{{ route('empty')}}">Empty Cart</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center m-0" role="alert">
                        Your Cart is <b>empty</b>.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
