<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4 text-center">Xác nhận OTP</h2>

        @if (session('message'))
        <div class="{{ session('message_type') == 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700' }} px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('message_type') == 'success' }}</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

        <form action="{{ route('Client.verifyOtp') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ $email }}" readonly required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:outline-none focus:border-blue-500 p-2">
            </div>
            <div class="mb-4">
                <label for="otp" class="block text-sm font-medium text-gray-700">Mã OTP:</label>
                <input type="text" name="otp" id="otp" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:outline-none focus:border-blue-500 p-2">
            </div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md transition duration-200">
                Xác nhận
            </button>
        </form>
    </div>
</body>

</html>
