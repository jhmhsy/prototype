<?php

namespace App\Http\Controllers;

use App\Models\Prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        if (!auth()->user()->canany(['price-view', 'price-edit'])) {
            abort(404); // forbidden / not found
        }

        $prices = Prices::all();
        return view('administrator.price.index', compact('prices'));
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'price' => 'required|numeric|min:0'
        ]);

        $price = Prices::findOrFail($id);
        $price->update($validated);


        return redirect()->back()->with('success', 'Price updated successfully');
    }
}