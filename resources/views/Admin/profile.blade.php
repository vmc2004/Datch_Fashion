@extends('Admin.layout.app')
@section('title', "Trang cá nhân")
@section('title-page', "Profile")
@section('content')
<style>
    
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
                        <img src="{{ Auth::user()->avatar ? '/uploads/' . Auth::user()->avatar : '/assets/images/no-avatar.svg' }}" alt="Avatar Admin"
                        class="rounded-circle me-2" style="width: 150px; height: 150px;">
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
                        <form>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="tenKhachHang">
                            Tên khách hàng
                           </label>
                           <input class="form-control" id="fullname" type="text" value="{{$user->fullname}}"/>
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="email">
                            Email
                           </label>
                           <input class="form-control" disabled="" id="email" type="email" value="{{$user->email}}"/>
                          </div>
                         </div>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="soDienThoai">
                            Số điện thoại
                           </label>
                           <input class="form-control" id="soDienThoai" type="text" value="{{$user->phone}}"/>
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="matKhau">
                            Mật khẩu
                           </label>
                           <input class="form-control" disabled="" id="matKhau" type="password" value="******"/>
                          </div>
                         </div>
                         <div class="row mb-3">
                          <div class="col-md-4">
                           <label class="form-label" for="tinhThanhPho">
                            Tỉnh / Thành phố
                           </label>
                           <input class="form-control" id="tinhThanhPho" placeholder="Chọn Tỉnh / Thành phố" type="text"/>
                          </div>
                          <div class="col-md-4">
                           <label class="form-label" for="quanHuyen">
                            Quận / Huyện
                           </label>
                           <input class="form-control" id="quanHuyen" placeholder="Chọn Quận / Huyện" type="text"/>
                          </div>
                          <div class="col-md-4">
                           <label class="form-label" for="xaPhuong">
                            Xã / Phường
                           </label>
                           <input class="form-control" id="xaPhuong" placeholder="Chọn Xã / Phường" type="text"/>
                          </div>
                         </div>
                         <div class="mb-3">
                          <label class="form-label" for="diaChi">
                           Địa chỉ
                          </label>
                          <textarea class="form-control" id="diaChi" rows="3">{{$user->address}}</textarea>
                         </div>
                         <div class="row">
                          <div class="col-md-6">
                           <label class="form-label">
                            Active
                           </label>
                           <div class="form-check form-switch">
                            <input checked="" class="form-check-input" id="active" type="checkbox"/>
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

@endsection
