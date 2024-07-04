@extends('layouts.master')
@section('content')
    <h2 class="text-2xl font-bold text-gray-800 px-24 my-10">My Cart</h2>
    <div class="grid grid-cols-2 gap-10 my-10 px-24">
        @foreach($carts as $cart)
        <div class="bg-gray-100 p-4 rounded-lg flex justify-between">
            <div>
                <p class="text-xl font-bold">{{$cart->product->name}}</p>
                <p class="text-lg font-thin">Rs. {{$cart->product->price}}</p>
                <p class="text-lg font-thin">Quantity: {{$cart->quantity}}</p>
                <div class="mt-5 flex justify-end gap-5">
                    <a href="" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Order Now</a>
                    <a href="" class="bg-red-600 text-white px-3 py-2 rounded-lg">Remove</a>
                </div>
            </div>
            <img src="{{asset('images/products/'.$cart->product->photopath)}}" alt="" class="h-full w-32 rounded-md object-cover">
        </div>
        @endforeach
    </div>
@endsection
