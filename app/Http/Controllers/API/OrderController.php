<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array|min:1', // array of product_id
        ]);

        $total = 0;
        foreach ($request->products as $product_id) {
            $product = Product::find($product_id);
            if ($product) $total += $product->price;
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $total,
            'status' => 'pending',
        ]);

        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::with('payment', 'user')->findOrFail($id);
        return response()->json($order);
    }
}
