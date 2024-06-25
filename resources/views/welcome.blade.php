@extends('layouts.master')
@section('content')
    <div class="my-20">
        <h1 class="text-4xl text-center">Latest Products</h1>
        <div class="grid grid-cols-3 gap-10 my-10 px-24">
            @foreach($latestproducts as $product)
            <a href="{{route('viewproduct',$product->id)}}">
                <div class="p-2 rounded-lg shadow">
                    <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full h-64 object-cover">
                    <div class="p-2">
                        <h2 class="text-xl font-semibold">{{$product->name}}</h2>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-thin">Rs. {{$product->price}}</span>
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach



        </div>
    </div>
@endsection
