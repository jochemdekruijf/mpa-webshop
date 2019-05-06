<?php

namespace App\Http\Controllers;
use Validator;
use App\Product;
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
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // 'product_name' => $request->get('product_name'),
            // 'product_price'=> $request->get('product_price'),
            // 'product_qty'=> $request->get('product_qty')
     
        //   $product->save();

          $rules = array(
            'product_name' => 'required',
            'product_price' => 'required|integer',
            'product_qty'=> 'required|integer'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('products/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $product = new Product();
            $product->product_name = $request->input('product_name');
            $product->product_price = $request->input('product_price');
            $product->product_qty = $request->input('product_qty');
            $product->save();
        }
        return redirect('/products')->with('success','product has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
