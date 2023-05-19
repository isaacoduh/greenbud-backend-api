<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::with(['category' => function($query) {
            $query->select('id','name');
        }])->get();

        return response()->json([
            'message' => 'Data retrieved',
            'data' => $data
        ]);
    }
}
