<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductSale;

class ProductsalesController extends Controller
{
    public function index()
    {



        if (!auth()->user()->can('productsales-list')) {
            abort(404); // forbidden / not found
        }

        $products = ProductSale::all();
        return view('administrator.productsales.index', compact('products'));


    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);

        ProductSale::create($validatedData);
        return redirect()->back()
            ->with('success', 'Product created successfully.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);

        $product = ProductSale::findOrFail($id);
        $product->update($validatedData);

        return redirect()->back()
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = ProductSale::findOrFail($id);
        $product->delete();

        return redirect()->back()
            ->with('success', 'Product deleted successfully.');
    }


}