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
    <p>Mã đơn hàng: {{ $order->code }}</p>
    <p>Ngày đặt hàng: {{ $order->created_at }}</p>
    <p>Địa chỉ giao hàng: {{ $order->address }}</p>
    <h4>Sản phẩm:</h4>
    <ul>
        @foreach ($order->orderDetails as $detail)
           
            <li>{{ $detail->productVariant->product->name }} - Màu sắc: {{ $detail->productVariant->color->name }} - Số lượng: {{ $detail->quantity }} - Giá: {{ number_format($detail->price, 0, ',', '.') }} VND</li>
        @endforeach
    </ul>
    <p><strong>Giao hàng: {{ number_format($order->shipping, 0, ',', '.') }} VND</strong></p>
    <p><strong>Giảm giá: {{ number_format($order->discount, 0, ',', '.') }} VND</strong></p>
    <p><strong>Tổng giá trị đơn hàng: {{ number_format($order->total_price, 0, ',', '.') }} VND</strong></p>
    <p>Mọi thắc mắc xin vui lòng liên hệ với chúng tôi qua email.</p>
</body>
</html>
