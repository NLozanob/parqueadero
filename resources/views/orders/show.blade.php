@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row p-3">
                    <div class="col-6">
                        Date: {{ $order->date}}
                        <br>
                        Total: ${{ $order->price }}
                    </div>
                    <div class="col-6">
                        Customer: {{ $customer->name }}
                        <br>
                        Document: {{ $customer->identification_document }}
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($details as $detail)
                            <tr>
                                <th>{{ $detail->product->name }}</th>
                                <th> ${{ $detail->product->price }} </th>
                                <th> {{ $detail->quantity }} </th>
                                <th>${{ $detail->subtotal }}</th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection