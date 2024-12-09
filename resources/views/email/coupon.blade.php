<!DOCTYPE html>
<html>
<head>
    <title>Mã Giảm Giá Mới</title>
</head>
<body>
    <h1>Chúc mừng!</h1>
    <p>Bạn đã nhận được mã giảm giá mới: <strong>{{ $couponCode['code'] }}</strong></p>
    @if ($couponCode['discount_type'] == 'fixed')
        <p>Mã giảm trực tiếp {{number_format($couponCode['discount'])}}đ vào giá trị đơn hàng </p>
    @else
    <p>Mã giảm {{number_format($couponCode['discount'])}}% giá trị đơn hàng </p>
    @endif
    <p>Hãy sử dụng mã này để được giảm giá trong lần mua sắm tiếp theo của bạn!</p>
    <p>Lưu ý : Mã số lượng có hạn số lượng {{$couponCode['quantity']}} mã toàn hệ thống</p>
    <p> Mỗi khách hàng được sử dụng 1 lần</p>
    <p>Ap dụng từ ngày {{$couponCode['start_date']}} đến ngày {{$couponCode['end_date']}} </p>
</body>
</html>
