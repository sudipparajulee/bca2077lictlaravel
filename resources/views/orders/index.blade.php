@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Orders</h2>
    <hr class="h-1 bg-amber-600">


    <div class="mt-10">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">Order Date</th>
                    <th class="border p-3">Picture</th>
                    <th class="border p-3">Product Name</th>
                    <th class="border p-3">Customer Name</th>
                    <th class="border p-3">Price</th>
                    <th class="border p-3">Quantity</th>
                    <th class="border p-3">Total</th>
                    <th class="border p-3">Status</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="text-center">
                    <td class="border p-3">{{$order->order_date}}</td>
                    <td class="border p-3">
                        <img src="{{asset('images/products/'.$order->product->photopath)}}" class="w-24" alt="">
                    </td>
                    <td class="border p-3">{{$order->product->name}}</td>
                    <td class="border p-3">{{$order->user->name}}</td>
                    <td class="border p-3">{{$order->price}}</td>
                    <td class="border p-3">{{$order->quantity}}</td>
                    <td class="border p-3">{{$order->price * $order->quantity}}</td>
                    <td class="border p-3">{{$order->status}}</td>
                    <td class="border p-3">
                        {{-- Pending  --}}
                        <a href="{{route('orders.status',[$order->id,'Pending'])}}" class="bg-red-500 text-white p-2 rounded-lg">Pending</a>
                        {{-- Processing  --}}
                        <a href="{{route('orders.status',[$order->id,'Processing'])}}" class="bg-yellow-500 text-white p-2 rounded-lg">Processing</a>
                        {{-- Delivered  --}}
                        <a href="{{route('orders.status',[$order->id,'Delivered'])}}" class="bg-green-500 text-white p-2 rounded-lg">Delivered</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
