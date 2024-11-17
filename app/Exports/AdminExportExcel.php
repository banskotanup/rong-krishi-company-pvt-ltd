<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\User;

class AdminExportExcel implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * Return a filtered collection of data for export.
     */
    public function collection()
    {
        $admins = User::where('is_admin', 1)
            ->where('is_delete', 0)
            ->where('status', 0)
            ->select(
                'id',
                'user_number',
                'name',
                'email',
                'phone',
                'country',
                'address',
                'status'
            )
            ->get();

        // Add S.No dynamically
        return $admins->map(function ($admin, $index) {
            return [
                'sno' => $index + 1, // Add Serial Number (S.No)
                'id' => $admin->id,
                'user_number' => $admin->user_number,
                'name' => $admin->name,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'country' => ucfirst($admin->country),
                'address' => $admin->address . ' ' . $admin->address_two,
                'status' => 'Active', // Since status = 0 is filtered, all will be 'Active'
            ];
        });
    }

    /**
     * Define the headings for the Excel sheet.
     */
    public function headings(): array
    {
        return [
            'S.No',       // Add S.No heading
            'ID',
            'User ID',
            'Name',
            'Email',
            'Phone',
            'Country',
            'Address',
            'Status',
        ];
    }

    /**
     * Apply styling to the Excel sheet.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Header row styling
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
