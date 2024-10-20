<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\CheckinRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->has('search')) {
            $query->where('id_number', 'like', '%' . $request->search . '%');
        }

        $members = $query->paginate(10);

        return view('administrator.checkin.index', compact('members'));
    }

    public function checkin(Request $request, Member $member)
    {
        $now = Carbon::now();

        CheckinRecord::create([
            'user_id' => $member->id,
            'type' => 'walking',
            'checkin_time' => $now->toTimeString(),
            'checkin_date' => $now->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Check-in recorded successfully.');
    }

    public function history(Request $request)
    {
        $query = CheckinRecord::query()->with('member');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('member', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id_number', 'like', '%' . $search . '%');
            });
        }

        $sort = $request->input('sort', 'desc');
        $query->orderBy('checkin_date', $sort)->orderBy('checkin_time', $sort);

        $checkins = $query->paginate(15);

        return view('administrator.checkin.history', compact('checkins', 'sort'));
    }
}