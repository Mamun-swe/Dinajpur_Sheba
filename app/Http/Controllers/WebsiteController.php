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
        $lichiall = Product::where('status', '=', 1)->where('product_type', '=', 'লিচু')->orderBy('id', 'DESC')->take(3)->get();
        $mangoall = Product::where('status', '=', 1)->where('product_type', '=', 'আম')->orderBy('id', 'DESC')->take(3)->get();
        $vegitableall = Product::where('status', '=', 1)->where('product_type', '=', 'শাক-সবজি')->orderBy('id', 'DESC')->take(3)->get();
        return view('website.product.index', compact('lichiall', 'mangoall', 'vegitableall'));
    }

    public function allProducts($productType){
        $productAll = Product::where('status', '=', 1)->where('product_type', '=', $productType)->orderBy('id', 'DESC')->paginate(30);
        return view('website.product.allproducts', compact('productAll'));
    }

    public function productShow($id){
        $data = Product::where('products.id', '=', $id)->first();
        return view('website.product.show', compact('data'));
    }

    public function checkout($id){
        $productid = $id;
        $product = Product::where('id', '=', $id)->first();
        return view('website.product.checkout', compact('productid', 'product'));
    }

    public function orderSubmit(Request $request){
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'nid' => 'required',
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
            'nid' => $request->nid,
            'location' => $request->location,
            'carinfo' => $request->carinfo,
            'payment_method' => $request->payment_method,
            'quantity' => $request->quantity,
            'status' => 'pending'
        );

        Order::create($form_data);
        return redirect()->back()->with('success', 'আপনার অর্ডার করা সম্পন্ন হয়েছে ।');
    }


    public function searchProduct(Request $request) {
        $searchData = $request->search_data;
        $data = Product::where('product_type', 'like', '%' . $searchData . '%')
            ->orWhere('category', 'like', '%' . $searchData . '%')
            ->where('status', '=', 1)->get();
        return view('website.search.index', compact('data'));
    }
}
