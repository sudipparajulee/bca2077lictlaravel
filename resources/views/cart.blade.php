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
                    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                        @csrf
                        <input type="text" id="amount" name="amount" value="100" required>
                        <input type="text" id="tax_amount" name="tax_amount" value ="10" required>
                        <input type="text" id="total_amount" name="total_amount" value="110" required>
                        <input type="text" id="transaction_uuid" name="transaction_uuid"  required>
                        <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
                        <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
                        <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                        <input type="text" id="success_url" name="success_url" value="{{route('home')}}" required>
                        <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
                        <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                        <input type="text" id="signature" name="signature" required>
                        <input value="Submit" type="submit">
                    </form>
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{$cart->id}}">
                        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Order Now</button>
                    </form>
                    <a href="" class="bg-red-600 text-white px-3 py-2 rounded-lg">Remove</a>
                </div>
            </div>
            <img src="{{asset('images/products/'.$cart->product->photopath)}}" alt="" class="h-full w-32 rounded-md object-cover">
        </div>
        @endforeach
    </div>

    @php
    $transaction_uuid = now()->timestamp;
$data = "total_amount=110,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
    $s = hash_hmac('sha256', $data, '8gBm/:&EnhH.1/q', true);
    $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = "{{$transaction_uuid}}";

        document.getElementById('signature').value = "{{$signature}}";
    </script>
@endsection
