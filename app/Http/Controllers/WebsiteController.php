<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Location;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.welcome');
    }

    public function products(){
        $products = Product::join('product_types', 'product_types.id', '=', 'products.product_type_id')
                    ->join('loading_points', 'loading_points.id', '=', 'products.loading_point_id')
                    ->where('products.status', '=', 1)
                    ->select(
                        'products.id', 
                        'products.stock_quantity', 
                        'products.price_per_unit', 
                        'products.product_image', 
                        'product_types.product_type_name'
                    )
                    ->orderBy('products.id', 'DESC')->paginate(30);
        return view('website.product.index', compact('products'));
    }

    public function productShow($id){
        $data = Product::join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->join('loading_points', 'loading_points.id', '=', 'products.loading_point_id')
                ->where('products.id', '=', $id)
                ->select(
                    'products.id', 
                    'products.stock_quantity', 
                    'products.price_per_unit', 
                    'products.product_image',
                    'products.product_info',
                    'product_types.product_type_name', 
                    'loading_points.loading_point'
                )
                ->first();
        return view('website.product.show', compact('data'));
    }

    public function checkout($id){
        $productid = $id;
        $location = Location::where('user_id', '=', Auth()->User()->id)->first();
        return view('website.product.checkout', compact('productid', 'location'));
    }

    public function orderSubmit(Request $request){
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'carinfo' => 'required',
            'payment_method' => 'required',
            'quantity' => 'required',
        ];
        $this->validate($request,$rules);

        $form_data = array(
            'user_id' => Auth()->User()->id,
            'productid' => $request->productid,
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
            'carinfo' => $request->carinfo,
            'payment_method' => $request->payment_method,
            'quantity' => $request->quantity,
            'status' => 'pending'
        );

        Order::create($form_data);
        return redirect()->back()->with('success', 'আপনার অর্ডার করা সম্পন্ন হয়েছে ।');
    }
}
