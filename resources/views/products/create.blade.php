@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Create Product</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10">
        <form action="">
            <div class="mb-5">
                <select name="category_id" id="" class="w-full p-3 border border-gray-300 rounded-lg">
                    <option value="">Select Category</option>
                    <option value="">Category 1</option>
                    <option value="">Category 2</option>
                    <option value="">Category 3</option>
                </select>
            </div>
            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Name" name="name">
            </div>
            <div class="mb-5">
                <textarea name="description" id="" cols="30" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Description"></textarea>
            </div>
            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" name="price">
            </div>

            <div class="mb-5">
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Stock" name="stock">
            </div>

            <div class="mb-5">
                <input type="file" class="w-full p-3 border border-gray-300 rounded-lg" name="photopath">
            </div>

            <div class="mb-5 flex gap-5 justify-center">
                <button class="bg-amber-600 text-white p-3 rounded-lg">Create Product</button>
                <a href="{{route('products.index')}}" class="bg-gray-600 text-white p-3 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>


@endsection
