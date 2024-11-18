<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserServicesController extends Controller
{
    public function index()
    {
        $userIdNumber = Auth::user()->id_number;

        // Fetch only the member with the matching id_number and its relationships
        $member = Member::with(['services', 'lockers', 'treadmills', 'qrcode', 'membershipDuration'])
            ->where('id_number', $userIdNumber)
            ->first();

        // Return the view with the specific member's data
        return view('services', compact('member'));
    }


    public function updateIdNumber(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string|max:255|unique:users,id_number',
        ]);

        // Update the authenticated user's id_number
        $user = Auth::user();
        $user->id_number = $request->id_number;
        $user->save();

        return redirect()->back()->with('success', 'ID Number updated successfully.');
    }
}