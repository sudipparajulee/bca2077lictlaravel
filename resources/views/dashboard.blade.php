@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-amber-600">Dashboard</h2>
    <hr class="h-1 bg-amber-600">

    <div class="grid grid-cols-3 gap-4 mt-10">
        <div class="bg-blue-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Users</h3>
            <p class="text-4xl text-white font-bold">100</p>
        </div>
        <div class="bg-red-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Products</h3>
            <p class="text-4xl text-white font-bold">{{$products}}</p>
        </div>
        <div class="bg-green-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Orders</h3>
            <p class="text-4xl text-white font-bold">300</p>
        </div>
        <div class="bg-red-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Categories</h3>
            <p class="text-4xl text-white font-bold">{{$categories}}</p>
        </div>
        <div class="bg-green-500 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Pending Orders</h3>
            <p class="text-4xl text-white font-bold">30</p>
        </div>
        <div class="bg-amber-600 p-4 shadow-md rounded-lg">
            <h3 class="font-bold text-2xl text-white">Total Visits</h3>
            <p class="text-4xl text-white font-bold">30000</p>
        </div>
    </div>
@endsection
