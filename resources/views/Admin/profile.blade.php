@extends('Admin.layout.app')
@section('title', "Trang cá nhân")
@section('title-page', "Profile")
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
                    <form action="/admin/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                    <div class="row">
                     <div class="col-md-3">
                      <div class="card">
                       <div class="card-body text-center">
                        <label for="avatarInput" class="d-block">
                            <div role="presentation" tabindex="0" class="position-relative">
                                <input id="avatarInput" name="avatar"  type="file" style="display: none;" onchange="previewAvatar(event)">
                                <div class="d-inline-block position-relative">
                                    <img id="avatarPreview" 
                                        src="{{ $user->avatar ? '/uploads/' . $user->avatar : '/assets/client/images/no-avatar.svg' }}" 
                                        class="rounded-circle border" 
                                        alt="Avatar" 
                                        style="width: 108px; height: 108px; object-fit: cover; cursor: pointer;">
                                    <span class="position-absolute bottom-0 start-0 w-100 d-flex align-items-center justify-content-center"
                                        style="height: 50px; background-color: rgba(200, 200, 200, 0.8); border-radius: 0 0 50px 50px; cursor: pointer;">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="camera" 
                                            class="text-secondary" role="img" xmlns="http://www.w3.org/2000/svg" 
                                            style="width: 24px;" 
                                            viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </label>
                        
                        <h4>{{$user->fullname}}</h4>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="d-flex justify-content-center">
                       <button class="btn btn-primary"> Đổi mật khẩu</button>
                       <button class="btn btn-success ms-1 text-white" >
                            <a href="{{ route('logout') }}" class="d-sm-inline d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
                            </a>  
                        </button>
                    </div>
                      </div>
                     </div>
                     <div class="col-md-9">
                      <div class="card">
                       <div class="card-header">
                       
                       </div>
                       <div class="card-body">
                      
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="tenKhachHang">
                            Tên khách hàng
                           </label>
                           <input class="form-control" id="fullname" name="fullname" type="text" value="{{$user->fullname}}"/>
                           @error('fullname')
                           <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                       @enderror
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="email">
                            Email
                           </label>
                           <input class="form-control" readonly id="email" name="email" type="email" value="{{$user->email}}"/>
                          </div>
                         </div>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="phone">
                            Số điện thoại
                           </label>
                           <input class="form-control"  name="phone" type="text" value="{{$user->phone}}"/>
                           @error('phonephone')
                           <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                       @enderror
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="matKhau">
                            Mật khẩu
                           </label>
                           <input class="form-control" readonly  name="password" id="password" type="password" value="{{$user->password}}"/>
                          </div>
                         </div>
                         <div class="mb-3 row">
                            <label class="form-label" for="matKhau">
                                Địa chỉ
                               </label>
                            <div class="col-sm-12">
                                <input type="text" id="address" name="address" 
                                    class="form-control rounded-2" 
                                    required placeholder="Nhập địa chỉ của bạn"
                                    autocomplete="off" value="{{$user->address}}">
                                <div id="ok" class="ok mt-2"></div>
                            </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                           <label class="form-label">
                            Active
                           </label>
                           <div class="form-check form-switch">
                            <input checked="" class="form-check-input" id="active" type="checkbox" disabled/>
                            <label class="form-check-label" for="active">
                             Yes
                            </label>
                           </div>
                          </div>
                         </div>
                         <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary" type="submit">Cập nhật</button>
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
        fetch(`https://rsapi.goong.io/Place/AutoComplete?api_key=${apiKey}&input=${encodeURIComponent(query)}&sessiontoken=${sessionToken}`)
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

    document.addEventListener('click', function (e) {
        if (!suggestionsContainer.contains(e.target) && e.target !== addressInput) {
            suggestionsContainer.style.display = 'none';
        }
    });
    document.getElementById('avatarInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatarPreview').src = e.target.result; // Xem trước ảnh
                };
                reader.readAsDataURL(file);
            }
        });
</script>
@endsection
