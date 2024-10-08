<!DOCTYPE html>
<html>
<head>
    <title>Mã Giảm Giá Mới</title>
</head>
<body>
    <h1>Chúc mừng!</h1>
    <p>Bạn đã nhận được mã giảm giá mới: <strong>{{ $couponCode['code'] }}</strong></p>
    <p>Hãy sử dụng mã này để được giảm giá trong lần mua sắm tiếp theo của bạn!</p>
    <p>Lưu ý : Mã số lượng có hạn số lượng {{$couponCode['usage_limit']}} mã, mỗi khách hàng được sử dụng {{$couponCode['usage_limit_per_user']}}</p>
</body>
</html>
