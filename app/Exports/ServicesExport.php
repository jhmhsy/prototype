<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ServicesExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    public function collection()
    {
        // Fetch all members along with their services
        return Member::with('services')->orderBy('id_number')->get();
    }

    public function headings(): array
    {
        return [
            'Member Name',
            'Service Type',
            'Start Date',
            'Due Date',
            'Amount (₱)',
            'Month (Quantity)',
            'Status',
            'Service ID'
        ];
    }

    public function map($member): array
    {
        $rows = [];
        foreach ($member->services as $service) {
            $rows[] = [
                $member->name,
                $service->service_type,
                $service->start_date,
                $service->due_date,
                $service->amount,
                $service->month,
                $service->status,
                $service->service_id
            ];
        }
        return $rows;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,  // Member Name
            'B' => 15,  // Service Type
            'C' => 15,  // Start Date
            'D' => 15,  // Due Date
            'E' => 20,  // Amount
            'F' => 20,  // Month
            'G' => 12,  // Status
            'H' => 20,  // Service ID
        ];
    }
}