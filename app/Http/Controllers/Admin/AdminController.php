<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function buyerIndex(){
        $data = User::where('account_type', '=', 'buyer')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.buyer.index', compact('data'));
    }

    public function orderIndex(){
        $data = Order::where('status', '=', 'pending')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.order.index', compact('data'));
    }

    public function orderShow($id){
        $order_id = $id;
        $order = Order::where('id', '=', $id)->first();
        $product = Product::join('orders', 'orders.productid', '=', 'products.id')
                    ->join('sellers', 'sellers.id', '=', 'products.seller_id')
                    ->where('orders.id', '=', $id)
                    ->first();
        return view('admin.order.show', compact('order', 'product', 'order_id'));
    }

    public function arrproveOrder(Request $request){
        $form_data = array(
            'status' => 'approved'
        );
        Order::where('id', '=', $request->order_id)->update($form_data); 
        return redirect()->back()->with('success', 'Successfully order approved.');
    }
}
