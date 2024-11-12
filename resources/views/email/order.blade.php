<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng tại Datch Fashion!</h1>
    <p>Xin chào, {{ $order->fullname }}</p>
    <p>Đơn hàng của bạn đã được xác nhận. Chúng tôi sẽ xử lý đơn hàng của bạn và gửi thông báo khi đơn hàng được giao.</p>
    <h3>Chi tiết đơn hàng:</h3>
    <p>Mã đơn hàng: {{ $order->id }}</p>
    <p>Ngày đặt hàng: {{ $order->created_at }}</p>
    <p>Địa chỉ giao hàng: {{ $order->address }}</p>
    <h4>Sản phẩm:</h4>
    <ul>
        @php
            $totalAmount = 0;
        @endphp
        @foreach ($order->orderDetails as $detail)
            @php
                $itemTotal = $detail->quantity * $detail->price;
                $totalAmount += $itemTotal;
            @endphp
            <li>{{ $detail->variant->product->name }} - Màu sắc: {{ $detail->variant->color->name }} - Số lượng: {{ $detail->quantity }} - Giá: {{ number_format($detail->price, 0, ',', '.') }} VND</li>
        @endforeach
    </ul>
    <p><strong>Tổng giá trị đơn hàng: {{ number_format($totalAmount, 0, ',', '.') }} VND</strong></p>
    <p>Mọi thắc mắc xin vui lòng liên hệ với chúng tôi qua email hoặc hotline.</p>
</body>
</html>
