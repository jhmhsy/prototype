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
        $userEmail = Auth::user()->email;

        // Fetch only the member with the matching id_number and its relationships
        $member = Member::with(['checkinRecords', 'services', 'lockers', 'treadmills', 'qrcode', 'membershipDuration'])
            ->where('id_number', $userIdNumber)
            ->orWhere('email', $userEmail)
            ->first();

        // Return the view with the specific member's data
        return view('components.homepage.services', compact('member'));
    }




    public function updateIdNumber(Request $request)
    {

        $request->validate([
            'id_number' => 'required|string|max:255|exists:members,id_number|unique:users,id_number',
        ]);

        $user = Auth::user();

        $member = Member::where('id_number', $request->id_number)->first();

        if ($member) {

            $user->id_number = $request->id_number;
            $user->save();

            return redirect()->back()->with('status', session('ID Number updated successfully!'));
        } else {

            return redirect()->back()->with('status', 'No member found with this ID number');

        }

    }

}