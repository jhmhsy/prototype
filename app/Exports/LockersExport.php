<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LockersExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    public function collection()
    {
        // Fetch all members along with their lockers
        return Member::with('lockers')->orderBy('id_number')->get();
    }

    public function headings(): array
    {
        return [
            'Member Name',
            'Locker No',
            'Start Date',
            'Due Date',
            'Amount (₱)',
            'Month (Quantity)',
            'Status'
        ];
    }

    public function map($member): array
    {
        $rows = [];
        foreach ($member->lockers as $locker) {
            $rows[] = [
                $member->name,
                $locker->locker_no,
                $locker->start_date,
                $locker->due_date,
                $locker->amount,
                $locker->month,
                $locker->status
            ];
        }
        return $rows;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,  // Member Name
            'B' => 15,  // Locker No
            'C' => 15,  // Start Date
            'D' => 15,  // Due Date
            'E' => 20,  // Amount
            'F' => 20,  // Month
            'G' => 12,  // Status
        ];
    }
}