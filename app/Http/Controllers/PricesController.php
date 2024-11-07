<?php

namespace App\Http\Controllers;

use App\Models\Prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        $prices = Prices::all();
        return view('administrator.price.index', compact('prices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        Prices::create($validated);

        return redirect()->route('prices.index')->with('success', 'Price added successfully');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'service_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $price = Prices::findOrFail($id);
        $price->update($validated);


        return redirect()->back()->with('success', 'Price updated successfully');
    }
}