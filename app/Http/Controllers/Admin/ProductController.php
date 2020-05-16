<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Seller;
use App\Models\ProductType;
use App\Models\LoadingPoint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::select('id', 'phone')->get();
        return view('admin.product.create', compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'seller_id' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'loading_point' => 'required',
            'stock_quantity' => 'required',
            'price_per_unit' => 'required',
            'product_info' => 'required',
            'product_image' => 'required',
        ];
        $this->validate($request,$rules);

        $file = $request->file('product_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/products', $filename);
  
        Product::create([
            'seller_id' => $request['seller_id'],
            'product_type' => $request['product_type'],
            'category' => $request['category'],
            'loading_point' => $request['loading_point'],
            'stock_quantity' => $request['stock_quantity'],
            'price_per_unit' => $request['price_per_unit'],
            'product_info' => $request['product_info'],
            'product_image' => $filename,
            'status' => 1,
        ]);

        return redirect()->back()->with('success', 'Successfully Product created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::where('products.id', '=', $id)->first();
        return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where('products.id', '=', $id)->first();
        return view('admin.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'product_type' => 'required',
            'loading_point' => 'required',
            'stock_quantity' => 'required',
            'price_per_unit' => 'required',
            'product_info' => 'required',
        ];
        $this->validate($request,$rules);

        $form_data = array(
            'product_type' => $request->product_type,
            'loading_point' => $request->loading_point,
            'stock_quantity' => $request->stock_quantity,
            'price_per_unit' => $request->price_per_unit,
            'product_info' => $request->product_info
        );
        Product::where('id', '=', $id)->update($form_data);
        return redirect()->back()->with('success', 'Successfully Product updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back();
    }
}
