<?php

namespace App\Exports;

use App\Models\Product;  // Ensure you're using the correct Product model
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductListExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        // Fetch products where 'is_deleted = 0'
        return Product::where('is_deleted', 0)->get();
    }

    public function headings(): array
    {
        // Remove Category and Sub Category from headings
        return [
            'S.No',
            'Title',
            'Purchase Quantity',
            'Purchase Price',
            'Selling Price',
            'Created By',
            'Created Date',
            'Status',
        ];
    }

    public function map($product): array
    {
        static $sno = 1;
        // Removed category and sub-category from the mapped data
        return [
            $sno++, 
            $product->title,
            $product->purchase_quantity,
            number_format($product->purchase_price, 2),
            number_format($product->price, 2),
            $product->created_by_name,
            date('d-m-Y', strtotime($product->created_at)),
            $product->status == 0 ? 'Active' : 'Inactive',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Styling header row
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
        ]);

        // Apply border style to data rows
        $sheet->getStyle('A2:H' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
    }
}
