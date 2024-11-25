<?php
// app/Exports/OrdersExport.php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class OrdersExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    public function collection()
    {
        return Order::all(); // Lấy tất cả các đơn hàng
    }

    public function headings(): array
    {
        return [
            'Mã đơn hàng',
            'Thời gian',
            'Khách hàng',
            'Tổng tiền hàng',
            'Trạng thái thanh toán',
            'Trạng thái',
        ];
    }

    public function styles($sheet)
    {
        return [
            // Cài đặt kiểu chữ cho sheet
            1 => ['font' => ['bold' => true]], // Dòng tiêu đề đậm
        ];
    }

    public function title(): string
    {
        return 'Danh sách hóa đơn';
    }
}
