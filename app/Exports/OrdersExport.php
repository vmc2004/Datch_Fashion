<?php
// app/Exports/OrdersExport.php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class OrdersExport implements FromCollection, WithHeadings, WithStyles, WithTitle, WithColumnWidths
{
    public function collection()
    {
        return Order::select(
            'code',        // Mã đơn hàng
            'fullname',    // Tên khách hàng
            'phone',       // Số điện thoại
            'address',     // Địa chỉ
            'email',       // Email
            'payment',  // Phương thức thanh toán
            'status',      // Trạng thái
            'note',        // Ghi chú
            'payment_status', // Trạng thái thanh toán
            'total_price', // Tổng tiền
            'created_at'   // Thời gian đặt hàng
        )->get();
    }

    public function headings(): array
    {
        return [
            'Mã đơn hàng',
            'Tên khách hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Email',
            'Phương thức thanh toán',
            'Trạng thái',
            'Ghi chú',
            'Trạng thái thanh toán',
            'Tổng tiền',
            'Thời gian đặt hàng',
        ];
    }

    public function styles($sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Dòng tiêu đề đậm
        ];
    }

    public function title(): string
    {
        return 'Danh sách hóa đơn';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15, // Chiều rộng cột A (Mã đơn hàng)
            'B' => 20, // Chiều rộng cột B (Tên khách hàng)
            'C' => 20, // Chiều rộng cột C (Số điện thoại)
            'D' => 60, // Chiều rộng cột D (Địa chỉ)
            'E' => 35, // Chiều rộng cột E (Email)
            'F' => 30, // Chiều rộng cột F (Phương thức thanh toán)
            'G' => 15, // Chiều rộng cột G (Trạng thái)
            'H' => 40, // Chiều rộng cột H (Ghi chú)
            'I' => 20, // Chiều rộng cột I (Trạng thái thanh toán)
            'J' => 15, // Chiều rộng cột J (Tổng tiền)
            'K' => 40, // Chiều rộng cột K (User_id)
          
        ];
    }
}
