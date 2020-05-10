<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $data = Order::where('user_id', '=', Auth()->User()->id)->orderBy('id', 'DESC')->paginate(15);
        return view('website.order.index', compact('data'));
    }
}
