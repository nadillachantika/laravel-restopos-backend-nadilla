<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{


    public function index()
    {
        $discounts = Discount::all();
        return response(['message' => 'success', 'data'=>$discounts], 200);
    }
    
}
