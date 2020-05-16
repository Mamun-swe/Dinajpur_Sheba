<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::orderBy('id', 'DESC')->paginate(10);
        return view('admin.seller.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seller.create');
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
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:sellers|regex:/(01)[0-9]{9}/',
            'location' => 'required',
        ];
        $this->validate($request,$rules);
  
        Seller::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'location' => $request['location'],
        ]);

        return redirect()->back()->with('success', 'Successfully Seller created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Seller::find($id);
        $myProducts = Product::where('products.seller_id', '=', $id)
                    ->where('products.status', '=', 1)
                    ->orderBy('products.id', 'DESC')->paginate(12);
        return view('admin.seller.show', compact('data', 'myProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seller::where('id',$id)->delete();
        Product::where('seller_id', '=', $id)->delete();
        return redirect()->back();
    }
}
