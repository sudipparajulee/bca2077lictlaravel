@extends('layouts.master')
@section('content')
    <div class="grid grid-cols-4 gap-10 px-24 py-10">
        <div>
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full h-64 object-cover shadow-lg rounded-lg">
        </div>
        <div class="col-span-2 border-r">
            <h1 class="text-4xl font-bold">{{$product->name}}</h1>
            <p class="text-xl font-thin mt-4">Rs. {{$product->price}}</p>
            <p class="text-xl font-thin mt-4">{{$product->description}}</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">Add to Cart</button>
        </div>
        <div>
            <p class="text-sm font-thin mt-4">Free Delivery</p>
            <p class="text-sm font-thin mt-4">7 Day Return</p>
            <p class="text-sm font-thin mt-4">Terms and Conditions Apply</p>
        </div>
    </div>

    <div class="my-10 px-24">
        <h2 class="font-bold text-4xl border-b-4">Related Products</h2>
        <div class="grid grid-cols-4 gap-10 mt-5">
            @foreach($relatedproducts as $product)
                <a href="{{route('viewproduct',$product->id)}}">
                    <div class="border rounded-lg shadow-lg">
                        <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h1 class="text-xl font-bold">{{$product->name}}</h1>
                            <p class="text-sm font-thin mt-4">Rs. {{$product->price}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
