<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        if (!auth()->user()->canany(['price-view', 'price-edit'])) {
            abort(404); // forbidden / not found
        }

        // $prices = Prices::all(); temporary 

        $prices = Prices::all()->map(function ($price) {
            switch ($price->service_type) {
                case '1month':
                    $price->service_type = '1 Month / Regular';
                    break;
                case '1monthstudent':
                    $price->service_type = '1 Month / Student';
                    break;
                case '3month':
                    $price->service_type = '3 Months';
                    break;
                case '6month':
                    $price->service_type = '6 Months';
                    break;
                case '12month':
                    $price->service_type = '12 Months';
                    break;
                default:
                    $price->service_type = ucfirst($price->service_type); // Capitalize if unknown
                    break;
                case 'WalkinService':
                    $price->service_type = 'Walk-in';
                    break;
                case 'Regular':
                    $price->service_type = 'Annual Membership (Regular) ';
                    break;
                case 'Walk-in':
                    $price->service_type = 'Annual Membership (Walk-in) ';
                    break;
            }
            return $price;
        });

        return view('administrator.price.index', compact('prices'));
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'price' => 'required|numeric|min:0'
        ]);

        $price = Prices::findOrFail($id);
        $price->update($validated);


        return redirect()->back()->with('success', 'Price updated!');
    }
}