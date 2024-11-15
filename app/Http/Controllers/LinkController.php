<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\QrRecord;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index($id)
    {
        $member = Member::findOrFail($id);
        return view('administrator.members.link', compact('member'));
    }


    public function updateIdNumber(Request $request, Member $member)
    {
        // Check if the member already has an ID number assigned or is already linked
        if (!is_null($member->id_number)) {
            return redirect('userlist')->with('error', 'User is already linked.');
        }

        // Validate the incoming request
        $request->validate([
            'id_number' => 'required|string|size:10'
        ]);

        // Check if the ID number is already taken in qr_records table
        if (QrRecord::where('id_number', $request->id_number)->exists()) {
            return redirect()->back()->with('error', 'This QR code is already taken. Choose another one');
        }

        // Update the member's ID number if not yet linked to any qr already
        $member->update([
            'id_number' => $request->id_number
        ]);

        // Save the ID number in qr_records table to avoid duplicates
        QrRecord::create([
            'id_number' => $request->id_number
        ]);


        return redirect()->route('members.index')
            ->with('success', 'Qrcode linked successfully');

    }

}