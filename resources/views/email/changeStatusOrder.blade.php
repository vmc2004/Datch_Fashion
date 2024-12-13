{{-- resources/views/email/changeStatusOrder.blade.php --}}
<h1>{{ $order->status === 'Đơn hàng đã hủy' ? 'Đơn hàng đã bị hủy' : 'Trạng thái đơn hàng đã thay đổi' }}</h1>
<p>Xin chào {{ $order->fullname }},</p>

<p>{{ $order->status === 'Đơn hàng đã hủy' ? 'Chúng tôi xin thông báo rằng đơn hàng của bạn đã bị hủy.' : 'Chúng tôi xin thông báo rằng trạng thái đơn hàng của bạn đã thay đổi.' }}</p>

@if($order->status === 'Đơn hàng đã hủy')
    <p>Lý do hủy: {{ $order->note }}</p>
@else
    <p>Trạng thái mới: {{ $order->status }}</p>
@endif

<p>Xin lỗi về sự bất tiện này. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại.</p>

<p>Trân trọng,<br>
Đội ngũ hỗ trợ khách hàng</p>
