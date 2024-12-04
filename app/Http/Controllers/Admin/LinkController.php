<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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

        // Original
        // if (!is_null($member->id_number)) {
        //     return redirect()->back()->with('error', 'User already linked.');
        // }

        if ($member->id_number !== '******') {
            return redirect()->back()->with('error', 'User already linked.');
        }

        // Validate the incoming request
        $request->validate([
            'id_number' => 'required|string|min:5|max:15'
        ]);

        // Check if the ID number is already taken in qr_records table
        if (QrRecord::where('id_number', $request->id_number)->exists()) {
            return redirect()->back()->with('error', 'QR code already taken! Choose another one');
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
            ->with('success', 'QR-code link success!');

    }


    public function unlinkMember($id)
    {
        // Find the member by ID
        $member = Member::find($id);

        if ($member && $member->id_number !== '******') {
            $member->id_number = '******';
            $member->save();

            return redirect()->back()->with('success', 'Member unlinked successfully.');
        }

        return redirect()->back()->with('error', 'Unable to unlink member.');
    }


}