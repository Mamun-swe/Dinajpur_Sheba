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
        $productTypes = ProductType::orderBy('id', 'DESC')->get();
        $loadingPoints = LoadingPoint::orderBy('id', 'DESC')->get();
        return view('admin.product.create', compact('sellers', 'productTypes', 'loadingPoints'));
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
            'product_type_id' => 'required',
            'loading_point_id' => 'required',
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
            'product_type_id' => $request['product_type_id'],
            'loading_point_id' => $request['loading_point_id'],
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
        $productTypes = ProductType::orderBy('id', 'DESC')->get();
        $loadingPoints = LoadingPoint::orderBy('id', 'DESC')->get();
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
        return view('admin.product.edit', compact('data', 'productTypes', 'loadingPoints'));
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
            'product_type_id' => 'required',
            'loading_point_id' => 'required',
            'stock_quantity' => 'required',
            'price_per_unit' => 'required',
            'product_info' => 'required',
        ];
        $this->validate($request,$rules);

        $form_data = array(
            'product_type_id' => $request->product_type_id,
            'loading_point_id' => $request->loading_point_id,
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
