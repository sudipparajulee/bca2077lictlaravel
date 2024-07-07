@extends('layouts.master')
@section('content')
    <div class="px-24">
        <h2 class="text-2xl font-bold text-gray-800 my-10">My Profile</h2>
        <div>
            <p class="text-xl font-bold">Name: {{auth()->user()->name}}</p>
            <p class="text-xl font-bold">Email: {{auth()->user()->email}}</p>
        </div>



        <h2 class="text-2xl font-bold text-gray-800 my-10">My Orders</h2>
        <div class="grid grid-cols-2 gap-10">
            @foreach($orders as $order)
            <div class="bg-gray-100 p-4 rounded-lg flex justify-between">
                <div>
                    <p class="text-xl font-bold">Order ID: {{$order->id}}</p>
                    <p class="text-lg font-thin">Product: {{$order->product->name}}</p>
                    <p class="text-lg font-thin">Total Amount: Rs. {{$order->price * $order->quantity}}</p>
                    <p class="text-lg font-thin">Order Date: {{$order->order_date}}</p>
                    <p class="text-lg font-thin">Status: {{$order->status}}</p>
                </div>
                <img src="{{asset('images/products/'.$order->product->photopath)}}" alt="" class="h-full w-32 rounded-md object-cover">
            </div>
            @endforeach
        </div>


    </div>
@endsection
