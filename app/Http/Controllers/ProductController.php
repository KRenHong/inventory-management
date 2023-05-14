<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // dump the request window -> dd($request);

        // Normal way of validating data
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $newProduct = Product::create($data);
        return redirect(route('products.index'));

        // $data = $request->validate([
        //     'name' => 'required',
        //     'quantity' => 'required|numeric',
        //     'price' => 'required|numeric',
        //     'description' => 'nullable'
        // ]);
    
        // $newProduct = Product::create($data);
    
        // if ($request->wantsJson()) {
        //     return response()->json($newProduct, 201);
        // }
    
        // return redirect(route('products.index'));

    }

    public function edit(Product $product){
        // dd($product);
        return view('products.edit', ['product' => $product]);
    }


    public function update(Product $product, Request $request){

        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);
        return redirect(route('products.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product Deleted Successfully');
    }
}
