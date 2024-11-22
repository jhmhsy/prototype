@php
$statusColors = [
'Active' => ['bg-green-500', 'text-green-500'],
'Pre-paid' => ['bg-blue-500', 'text-blue-500'],
'Due' => ['bg-yellow-500', 'text-yellow-500'],
'Overdue' => ['bg-red-500', 'text-red-500'],
'Expired' => ['bg-gray-500', 'text-gray-500']
];

$status = $member->membershipDuration ? $member->membershipDuration->status : 'Pre-paid';
[$bgColor, $textColor] = $statusColors[$status] ?? ['bg-gray-500', 'text-white'];
@endphp