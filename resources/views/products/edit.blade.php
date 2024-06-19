@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Edit Product</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10">
        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <select name="category_id" id="" class="w-full p-3 border border-gray-300 rounded-lg">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if($category->id == $product->category_id)
                                selected
                            @endif
                            >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Name" name="name" value="{{$product->name}}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <textarea name="description" id="" cols="30" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Description">{{$product->description}}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" name="price" value="{{$product->price}}">
                @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Stock" name="stock" value="{{$product->stock}}">
                @error('stock')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <p>Current Picture</p>
            <img src="{{asset('images/products/'.$product->photopath)}}" class="w-56" alt="">
            <div class="mb-5">
                <input type="file" class="w-full p-3 border border-gray-300 rounded-lg" name="photopath">
                @error('photopath')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-5 flex gap-5 justify-center">
                <button class="bg-amber-600 text-white p-3 rounded-lg">Update Product</button>
                <a href="{{route('products.index')}}" class="bg-gray-600 text-white p-3 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>


@endsection
