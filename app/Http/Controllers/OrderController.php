<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
        ]);
        $cart = Cart::find($request->cart_id);
        $data['user_id'] = $cart->user_id;
        $data['product_id'] = $cart->product_id;
        $data['quantity'] = $cart->quantity;
        $data['price'] = $cart->product->price;
        $data['status'] = 'Pending';
        $data['order_date'] = date('Y-m-d');
        Order::create($data);
        $cart->delete();
        return back()->with('success', 'Order placed successfully');
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        //send email
        $data = [
            'name' => $order->user->name,
            'status' => $order->status,
        ];
        Mail::send('emails.orderemail', $data, function ($message) use ($order) {
            $message->to($order->user->email, $order->user->name)->subject('Your Order is now ' . $order->status );
        });

        return back()->with('success', 'Order status updated successfully');
    }
}
