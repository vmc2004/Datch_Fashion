@extends('Client.layout.layout')

@section('title', "Chat")


@section('content')


<div class="chat-container">
    <!-- Header -->
    <div class="chat-header">
        <div class="chat-back-btn" id="backToConversations">←</div>
        <div class="chat-info">
            <div class="chat-title">DATCH FASHION</div>
            <div class="chat-subtitle">Hãy hỏi bất cứ điều gì hoặc chia sẻ...</div>
        </div>
    </div>

    <!-- Chat Body -->
    <div class="chat-body">
        <!-- Tin nhắn mẫu -->
        <div class="chat-message">
           
            
        </div>
    </div>

    <!-- Footer -->
    <div class="chat-footer">
        <textarea id="messageInput" placeholder="Nhập tin nhắn"></textarea>
        <button id="sendMessage">Gửi</button>
    </div>
</div>
<div class="conversation-list" id="conversationList" style="display: none;">
    
</div>

<style>
   .chat-container, .conversation-list {
    width: 100%;
    max-width: 400px;
    margin: auto;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    font-family: Arial, sans-serif;
}

/* Header */
.chat-header {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #2d3e50;
    color: white;
}

.chat-back-btn {
    cursor: pointer;
    font-size: 20px;
    margin-right: 10px;
    user-select: none;
}

.chat-info {
    flex: 1;
}

.chat-title {
    font-size: 16px;
    font-weight: bold;
}

.chat-subtitle {
    font-size: 14px;
    color: #cccccc;
}

/* Body */
.chat-body {
    padding: 10px;
    background-color: #f9f9f9;
    height: 300px;
    overflow-y: auto;
}

.chat-message {
    background: #fff;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* Footer */
.chat-footer {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #f0f0f0;
    border-top: 1px solid #ddd;
}

.chat-footer textarea {
    flex: 1;
    resize: none;
    height: 40px;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px;
    margin-right: 10px;
}

.chat-footer button {
    background-color: #2d3e50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
}

.conversation-list {
    padding: 10px;
    background-color: #fff;
    height: 400px;
    overflow-y: auto;
}

.conversation-item {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    background: #f9f9f9;
}

.conversation-item:hover {
    background: #ececec;
}

</style>
@endsection

@section('scripts')
<script>
   document.getElementById('sendMessage').addEventListener('click', function () {
    const messageInput = document.getElementById('messageInput');
    const receiverId = 1; // Thay bằng ID người nhận thực tế

    // Kiểm tra tin nhắn không trống
    if (messageInput.value.trim() !== '') {
        fetch('/account/chat/sendMessage', { // Đảm bảo URL khớp với route Laravel
            method: 'POST', // Phương thức POST
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                receiver_id: receiverId, // ID người nhận
                message: messageInput.value, // Nội dung tin nhắn
            }),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
                if (data.success) {
                    messageInput.value = ''; // Xóa tin nhắn sau khi gửi
                } else {
                    alert('Gửi tin nhắn thất bại!');
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('Đã xảy ra lỗi khi gửi tin nhắn!');
            });
    } else {
        alert('Tin nhắn không được để trống!');
    }
});




</script>
@endsection
