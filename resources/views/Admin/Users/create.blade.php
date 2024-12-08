@extends('Admin.layout.app')
@section('title', 'Thêm người dùng')
@section('title-page', 'Khách hàng')
@section('single-page', 'Thêm người dùng mới')
@section('content')
    <style>
        .suggestions {
            position: absolute;
            background: #1a1d24;
            width: 100%;
            max-height: 300px;
            overflow-y: auto;

            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            z-index: 1000;
            display: none;
            margin-top: 3px;
            border: 1px solid #3f4451;
        }

        .suggestion-item {
            padding: 12px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: white;
            border-bottom: 1px solid #3f4451;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: #292e3a;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:before {
            content: "📍";
            margin-right: 10px;
            font-size: 1.1em;
            transition: transform 0.3s ease;
        }

        .suggestion-item:hover {
            background: #3a4150;
            color: #ffffff;
            padding-left: 24px;
        }

        .suggestion-item:hover:before {
            transform: scale(1.2);
        }

        .suggestion-item:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--primary);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .suggestion-item:hover:after {
            transform: scaleY(1);
        }

        .address-container {
            position: relative;
            margin-bottom: 20px;
        }

        /* Tùy chỉnh thanh cuộn */
        .suggestions::-webkit-scrollbar {
            width: 8px;
        }

        .suggestions::-webkit-scrollbar-track {
            background: #1a1d24;
            border-radius: 8px;
        }

        .suggestions::-webkit-scrollbar-thumb {
            background: #3f4451;
            border-radius: 8px;
        }

        .suggestions::-webkit-scrollbar-thumb:hover {
            background: #4f5565;
        }

        #phone {
            filter: blur(5px)
        }
    </style>
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/client/images/no-avatar.svg') }}" alt="Avatar Admin"
                                            class="rounded-circle me-2" style="width: 150px; height: 150px;">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="tenKhachHang">
                                                        Tên khách hàng
                                                    </label>
                                                    <input class="form-control" name="fullname" id="fullname"
                                                        type="text" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="email">
                                                        Email
                                                    </label>
                                                    <input class="form-control" name="email" id="email"
                                                        type="email" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="soDienThoai">
                                                        Số điện thoại
                                                    </label>
                                                    <input class="form-control" name="phone" id="soDienThoai"
                                                        type="text" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="matKhau">
                                                        Mật khẩu
                                                    </label>
                                                    <input class="form-control" name="password" id="matKhau"
                                                        type="password" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="diaChi">
                                                    Địa chỉ
                                                </label>
                                                <input type="text" id="address" name="address" class="form-control "
                                                    required placeholder="Nhập địa chỉ của bạn" autocomplete="off">
                                                <div id="ok" class="ok block"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    {{-- <label class="form-label">
                                                        Active
                                                    </label>
                                                    <div class="form-check form-switch">
                                                        <input checked="" class="form-check-input" name="status"
                                                            id="active" type="checkbox" />
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <label class="form-label" for="diaChi">
                                                            Vai trò
                                                        </label>
                                                        <select name="role" id="" class="border rounded-2">
                                                            <option value="member">Member</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button class="btn btn-primary" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const apiKey = '0ChWSfCbLYvwL5nNJke0tHln2QewXBUBTcpMnZdK';
        const addressInput = document.getElementById('address');
        const suggestionsContainer = document.getElementById('ok');
        const cityInput = document.getElementById('city');
        const districtInput = document.getElementById('district');
        const wardInput = document.getElementById('ward');
        let sessionToken = crypto.randomUUID();

        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        const debouncedSearch = debounce((query) => {
            if (query.length < 2) {
                suggestionsContainer.style.display = 'none';
                return;
            }

            // đây là demo, các bạn nên dùng API từ backend để tăng bảo mật, có thể thêm cache và rate limit
            fetch(
                    `https://rsapi.goong.io/Place/AutoComplete?api_key=${apiKey}&input=${encodeURIComponent(query)}&sessiontoken=${sessionToken}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        suggestionsContainer.innerHTML = '';
                        suggestionsContainer.style.display = 'block';

                        data.predictions.forEach(prediction => {
                            const div = document.createElement('div');
                            div.className = 'suggestion-item';
                            div.textContent = prediction.description;
                            div.addEventListener('click', () => {
                                addressInput.value = prediction.description;
                                suggestionsContainer.style.display = 'none';

                                // Tự động điền các trường địa chỉ từ compound
                                if (prediction.compound) {
                                    cityInput.value = prediction.compound.province || '';
                                    districtInput.value = prediction.compound.district || '';
                                    wardInput.value = prediction.compound.commune || '';
                                }
                            });
                            suggestionsContainer.appendChild(div);
                        });
                    }
                })
                .catch(error => console.error('Lỗi:', error));
        }, 300);

        addressInput.addEventListener('input', (e) => debouncedSearch(e.target.value));

        document.addEventListener('click', function(e) {
            if (!suggestionsContainer.contains(e.target) && e.target !== addressInput) {
                suggestionsContainer.style.display = 'none';
            }
        });
    </script>
@endsection
