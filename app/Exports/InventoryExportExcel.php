<?php

namespace App\Exports;

use App\Models\Inventory; // Assuming your model is Inventory
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InventoryExportExcel implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * Return the collection of data to be exported
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Inventory::where('is_deleted', 0)->get();
    }

    /**
     * Set headings for the export file
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'S.No',
            'Product Name',
            'Purchase Quantity',
            'Sold Quantity',
            'Remaining Quantity',
            'Status',
        ];
    }

    /**
     * Map each record to a row for the export
     *
     * @param  \App\Models\Inventory  $inventory
     * @return array
     */
    public function map($inventory): array
    {
        static $sno = 1; // Static variable to keep track of the serial number

        return [
            $sno++, // Increment the serial number for each row
            $inventory->title,
            $inventory->purchase_quantity,
            $inventory->sold_quantity,
            $inventory->remaining_quantity,
            $inventory->remaining_quantity > 0 ? 'Available' : 'Out of Stock',
        ];
    }

    /**
     * Apply styles to the sheet
     *
     * @param  \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet  $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Style the header row
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'], // White text
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '4CAF50', // Green background
                ],
            ],
        ]);

        // Apply border style for the data rows
        $sheet->getStyle('A2:F' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black border
                ],
            ],
        ]);
    }
}
