<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $data = [];
        $data['customer_name'] = $request->firstName . " " . $request->lastName;
        $data['customer_phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['subtotal'] = number_format($request->subtotal,2);
        $data['vat'] =  number_format($request->tax,2);
        $data['total'] = number_format($request->total,2);
        $data['order_status'] = 'pending';
        $data['payment_type'] = $request->paymentType === 'cash' ? 'cash_on_delivery': 'card';

        // create an order
        try {
            $order = Order::create($data);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'message' => 'Order Placed Successfully',
            'data' => $order
        ]);
    }
}
