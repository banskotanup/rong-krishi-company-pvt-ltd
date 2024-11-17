<?php

namespace App\Exports;

use App\Models\Order;  // Make sure to import the correct model
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderListExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        // Fetch orders with 'is_deleted = 0'
        return Order::where('is_delete', 0)->get();
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Name',
            'Order Number',
            'Country',
            'Address',
            'City',
            'State',
            'Postcode',
            'Phone',
            'Email',
            'Discount Code',
            'Discount Amount (NPR)',
            'Shipping Amount (NPR)',
            'Total Amount (NPR)',
            'Payment Method',
            'Created Date',
            'Status',
        ];
    }

    public function map($order): array
    {
        static $sno = 1;
        return [
            $sno++, 
            $order->first_name . ' ' . $order->last_name,
            $order->order_number,
            $order->country,
            $order->address_one . ' ' . $order->address_two,
            $order->city,
            $order->state,
            $order->postcode,
            $order->phone,
            $order->email,
            $order->discount_code,
            number_format($order->discount_amount, 2),
            number_format($order->shipping_amount, 2),
            number_format($order->total_amount, 2),
            ucfirst($order->payment_method),
            date('d-m-Y', strtotime($order->created_at)),
            $this->getStatusLabel($order->status),
        ];
    }

    private function getStatusLabel($status)
    {
        switch ($status) {
            case 0:
                return 'Pending';
            case 1:
                return 'In Progress';
            case 2:
                return 'Delivered';
            case 3:
                return 'Completed';
            case 4:
                return 'Cancelled';
            default:
                return 'Unknown';
        }
    }

    public function styles(Worksheet $sheet)
    {
        // Style the header row
        $sheet->getStyle('A1:P1')->applyFromArray([
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

        // Apply border style for the data rows
        $sheet->getStyle('A2:P' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
    }
}
