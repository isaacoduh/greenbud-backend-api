<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();

        return response()->json([
            'message' => 'Data Recieved Successfully',
            'data' => $orders
        ]);
    }

    public function getASingleOrder(Request $request, $id)
    {
        $order = Order::where('id',$id)->first();

        return response()->json([
            'message' => 'Data Retrieved!',
            'data' => $order
        ]);
    }

    public function placeOrder(Request $request)
    {
        $data = [];
        $details = [];
        $data['customer_name'] = $request->firstName . " " . $request->lastName;
        $data['customer_phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['subtotal'] = number_format($request->subtotal,2);
        $data['vat'] =  number_format($request->tax,2);
        $data['total'] = number_format($request->total,2);
        $data['order_status'] = 'pending';
        $data['payment_type'] = $request->paymentType === 'cash' ? 'cash_on_delivery': 'card';

        // $data['cart'] = $request->cart;

        // create an order
        try {
            $order = Order::create($data);
            foreach ($request->cart as $item) {
                $orderDetail = [];
                $orderDetail['order_id'] = $order->id;
                $orderDetail['product_id'] = $item['id'];
                $orderDetail['quantity'] = $item['quantity'];
                $orderDetail['unit_price'] = $item['price'];
                $orderDetail['subtotal'] = $item['price'] * $item['quantity'];

                $createOrderDetails = OrderDetails::create($orderDetail);
                // array_push($details, $orderDetail);
            }           

        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'message' => 'Order Placed Successfully',
            'data' => $order
        ]);
    }
}
