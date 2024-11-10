<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class TreadmillsExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    public function collection()
    {
        // Fetch all members along with their treadmills
        return Member::with('treadmills')->orderBy('id_number')->get();
    }

    public function headings(): array
    {
        return [
            'Member Name',
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
        foreach ($member->treadmills as $treadmill) {
            $rows[] = [
                $member->name,
                $treadmill->start_date,
                $treadmill->due_date,
                $treadmill->month,
                $treadmill->amount,
                $treadmill->status
            ];
        }
        return $rows;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,  // Name
            'B' => 15,  // Start Date
            'C' => 15,  // Due Date
            'D' => 20,  // Month
            'E' => 20,  // Amount
            'F' => 12,  // Status
        ];
    }
}