@extends('Admin.layout.app')
@section('title', "Thêm người dùng")
@section('title-page', "Khách hàng")
@section('single-page', "Thêm người dùng mới")
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
                        <form>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="tenKhachHang">
                            Tên khách hàng
                           </label>
                           <input class="form-control" id="fullname" type="text" />
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="email">
                            Email
                           </label>
                           <input class="form-control"  id="email" type="email" />
                          </div>
                         </div>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label" for="soDienThoai">
                            Số điện thoại
                           </label>
                           <input class="form-control" id="soDienThoai" type="text"/>
                          </div>
                          <div class="col-md-6">
                           <label class="form-label" for="matKhau">
                            Mật khẩu
                           </label>
                           <input class="form-control"  id="matKhau" type="password" />
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
                          <textarea class="form-control" id="diaChi" rows="3"></textarea>
                         </div>
                         <div class="row mb-3">
                          <div class="col-md-6">
                           <label class="form-label">
                            Active
                           </label>
                           <div class="form-check form-switch">
                            <input checked="" class="form-check-input" id="active" type="checkbox"/>
                           </div>
                           <div class="mb-3">
                            <label class="form-label" for="diaChi">
                                Vai trò
                            </label>
                            <select name="role" id="">
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

@endsection
