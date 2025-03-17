<?php

namespace App\Exports;

use App\Models\Stylist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StylistCommissionExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithColumnFormatting
{
    /**
     * Fetch data from database.
     */
    public function collection()
    {
        return Stylist::with(['appointments' => function ($query) {
            $query->where('appointment_status', 1)
                  ->where('status', 1)
                  ->where('payment_status', 'paid')
                  ->with(['service']);
        }])->get();
    }

    /**
     * Define column headings.
     */
    public function headings(): array
    {
        return [
            'Stylist Name',
            'Total Appointments',
            'Total Service Price (PKR)',
            'Commission %',
            'Total Commission Amount (PKR)'
        ];
    }

    /**
     * Map the data for each row.
     */
    public function map($stylist): array
    {
        $totalServicePrice = $stylist->appointments->sum(fn($appointment) => $appointment->service->Price);
        $totalCommission = ($totalServicePrice * $stylist->commission_rate) / 100;

        return [
            $stylist->name,
            $stylist->appointments->count(),
            '₨ ' . number_format($totalServicePrice, 2),
            $stylist->commission_rate . '%',
            '₨ ' . number_format($totalCommission, 2),
        ];
    }

    /**
     * Style the sheet (bold headers).
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Headings row (bold)
            1 => ['font' => ['bold' => true, 'size' => 12, 'color' => ['rgb' => 'FFFFFF']]],
            
            // Set background color for heading row
            'A1:E1' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => '333F50'],
                ],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }

    /**
     * Apply column formatting.
     */
    public function columnFormats(): array
    {
        return [
            'C' => '"₨ "#,##0.00', // Total Service Price in PKR Format
            'D' => NumberFormat::FORMAT_PERCENTAGE_00, // Commission %
            'E' => '"₨ "#,##0.00', // Total Commission Amount in PKR Format
        ];
    }
}
