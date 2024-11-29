<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailySalesExport implements FromCollection, WithHeadings
{
    private $serviceCounts;
    private $priceData;
    private $memberCounts;
    private $lockerAmount;
    private $treadmillAmount;
    private $totalSales;

    public function __construct($serviceCounts, $priceData, $memberCounts, $lockerAmount, $treadmillAmount, $totalSales)
    {
        $this->serviceCounts = $serviceCounts;
        $this->priceData = $priceData;
        $this->memberCounts = $memberCounts;
        $this->lockerAmount = $lockerAmount;
        $this->treadmillAmount = $treadmillAmount;
        $this->totalSales = $totalSales;
    }

    public function collection()
    {
        $data = [];
        $grandTotal = 0;

        // Add Walk-in Membership
        $walkInAmount = $this->priceData['Walk-in'] * $this->memberCounts['Walkin'];
        $data[] = [
            'Type' => 'Walk-in Membership',
            'Amount' => $walkInAmount
        ];
        $grandTotal += $walkInAmount;

        // Add Regular Membership
        $regularAmount = $this->priceData['Regular'] * $this->memberCounts['Regular'];
        $data[] = [
            'Type' => 'Regular Membership',
            'Amount' => $regularAmount
        ];
        $grandTotal += $regularAmount;

        // Add service details with amount
        foreach (['1month', '1monthstudent', '3month', '6month', '12month', 'WalkinService'] as $serviceType) {
            $amount = ($this->priceData[$serviceType] ?? 0) * $this->serviceCounts[$serviceType];
            $data[] = [
                'Type' => $this->formatServiceType($serviceType),
                'Amount' => $amount
            ];
            $grandTotal += $amount;
        }

        // Add Lockers
        $data[] = [
            'Type' => 'Lockers',
            'Amount' => $this->lockerAmount
        ];
        $grandTotal += $this->lockerAmount;

        // Add Treadmills
        $data[] = [
            'Type' => 'Treadmills',
            'Amount' => $this->treadmillAmount
        ];
        $grandTotal += $this->treadmillAmount;

        // Add Total Row
        $data[] = [
            'Type' => 'TOTAL',
            'Amount' => $this->totalSales
        ];

        return collect($data);
    }

    public function headings(): array
    {
        return ['Type', 'Amount'];
    }

    private function formatServiceType($type)
    {
        $mapping = [
            '1month' => '1 Month',
            '1monthstudent' => '1 Month (Student)',
            '3month' => '3 Months',
            '6month' => '6 Months',
            '12month' => '12 Months',
            'WalkinService' => 'Walk-in Service'
        ];
        return $mapping[$type] ?? $type;
    }
}