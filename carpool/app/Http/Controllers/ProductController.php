<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products=Product::all();
       return view('product\index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('product\create');
    }

    

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $product = new Product();
      $product-> code = $request->get('code');
      $product-> name = $request->get('name');
      $product-> save();
      
      return redirect('products')->with('success',"info added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $product = Product::find($id);
  
        return view('product\edit', compact('product', 'id'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $product = Product::find($id);
      $product-> code = $request->get('code');
      $product-> name = $request->get('name');
      $product-> save();
      
      return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Product::find($id);
       $product->delete();
        return redirect('products')->with('success',"info destroy");
    }
}
