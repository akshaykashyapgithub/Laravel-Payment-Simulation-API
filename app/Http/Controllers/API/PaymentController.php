<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Simulate payment for an order
    public function pay(Order $order)
    {
        if ($order->status == 'paid') {
            return response()->json(['message' => 'Order already paid']);
        }

        // Randomly choose payment status
        $status = ['success', 'failed', 'pending'][array_rand(['success', 'failed', 'pending'])];

        $payment = Payment::create([
            'order_id' => $order->id,
            'status' => $status,
            'payment_method' => 'simulated',
        ]);

        if ($status == 'success') {
            $order->status = 'paid';
            $order->save();
        } elseif ($status == 'failed') {
            $order->status = 'failed';
            $order->save();
        } else {
            // Pending payment stays pending
            // Optional: auto-update after delay
            dispatch(function() use ($payment) {
                sleep(10); // 10 seconds delay
                $newStatus = ['success', 'failed'][array_rand(['success', 'failed'])];
                $payment->status = $newStatus;
                $payment->save();

                $order = $payment->order;
                $order->status = $newStatus == 'success' ? 'paid' : 'failed';
                $order->save();
            });
        }

        return response()->json([
            'order_id' => $order->id,
            'payment_status' => $status
        ]);
    }

    // Simulate payment webhook
    public function webhook(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'status' => 'required|in:success,failed',
        ]);

        $payment = Payment::findOrFail($request->payment_id);
        $payment->status = $request->status;
        $payment->save();

        $order = $payment->order;
        $order->status = $request->status == 'success' ? 'paid' : 'failed';
        $order->save();

        return response()->json(['message' => 'Payment status updated', 'payment' => $payment]);
    }
}
