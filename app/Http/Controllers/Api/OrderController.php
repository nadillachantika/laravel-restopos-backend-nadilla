<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function saveOrder(Request $request)
    {
        $request->validate([
            'payment_amount' => 'required',
            // 'subtotal' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'service_charge' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'total_item' => 'required',
            // 'kasir_id' => 'required',
            // 'kasir_name' => 'required',
            'transaction_time' => 'required',
            'order_items' => 'nullable'
        ]);

        $order = Order::create([
            'payment_amount' => $request->payment_amount,
            'sub_total' => $request->sub_total,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'service_charge' => $request->service_charge,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'total_item' => $request->total_item,
            'id_kasir' => $request->id_kasir,
            'nama_kasir' => $request->nama_kasir,
            'transaction_time' => $request->transaction_time,
        ]);

        foreach ($request->order_items as $item){
            OrderItem::create([
                'id_order' => $order->id,
                'id_product' => $item['id_product'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => 0
            ]);
        }
        return response(['message' => 'success', 'data'=>$order], 200);
    }

    public function getOrderDetail(){

        $orderItem = OrderItem::all();
        $orderItem->load(['product', 'order']);

        return response(['message' => 'success', 'data'=>$orderItem], 200);
    }
}
