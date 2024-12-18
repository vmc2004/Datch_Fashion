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
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
                                            @csrf
                                            <section>
                                            <div role="presentation" tabindex="0" class="outline-none">
                                                <input id="avatarInput" name="avatar" accept="image/*" multiple="" type="file" tabindex="-1" style="display: none;">
                                                <div class="inline-block ml-auto relative group">
                                                    <span
                                                        class="bottom-0 rounded-b-3xl h-14 absolute flex b-0 l-0 w-full items-center justify-center cursor-pointer"
                                                        style="background: hsla(0, 0%, 77%, .8); border-radius: 0 0 60px 60px;"
                                                        onclick="document.getElementById('avatarInput').click();">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                                            data-icon="camera" class="overflow-visible w-8 text-3xl"
                                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>

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

        document.getElementById('avatarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result; // Xem trước ảnh
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
