<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
class MembersExport implements FromCollection, WithHeadings, WithColumnWidths
{
    public function collection()
    {
        // Fetch all members and order by id_number
        return Member::orderBy('id_number')->get([
            'id_number',
            'name',
            'phone',
            'fb',
            'email',
            'membership_type',

        ]);
    }

    public function headings(): array
    {
        return [
            'ID Number',
            'Name',
            'Phone',
            'Facebook',
            'Email',
            'Membership Type',

        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,  // ID Number
            'B' => 20,  // Name
            'C' => 15,  // Phone
            'D' => 15,  // Facebook
            'E' => 20,  // Email
            'F' => 20,  // Membership Type

        ];
    }
}