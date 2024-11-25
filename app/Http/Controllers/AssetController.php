<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;

use App\Exports\MembersExport;
use App\Exports\ServicesExport;
use App\Exports\LockersExport;
use App\Exports\TreadmillsExport;
use Maatwebsite\Excel\Facades\Excel;
class AssetController extends Controller
{
    // App\Http\Controllers\Administrator\AssetController.php

    // App\Http\Controllers\Administrator\AssetController.php

    public function index(Request $request)
    {
        $filter = $request->input('filter', 'services'); // Default to 'services'
        $status = $request->input('status', null);       // Default to null (no status filter)

        if ($filter === 'services') {
            $query = Service::with('member');
        } elseif ($filter === 'lockers') {
            $query = Locker::with('member');
        } elseif ($filter === 'treadmills') {
            $query = Treadmill::with('member');
        } else {
            $filter = 'services'; // Fallback to 'services' if filter is invalid
            $query = Service::with('member');
        }

        if ($status) {
            $query->where('status', $status);
        }

        $data = $query->get();

        return view('administrator.asset.index', compact('data', 'filter', 'status'));
    }



    public function exportMembers()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
    public function exportServices()
    {
        return Excel::download(new ServicesExport, 'services.xlsx');
    }

    public function exportLockers()
    {
        return Excel::download(new LockersExport, 'lockers.xlsx');
    }
    public function exportTreadmills()
    {
        return Excel::download(new TreadmillsExport, 'treadmills.xlsx');
    }



}