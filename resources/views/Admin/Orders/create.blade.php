@extends('Admin.layout.app')
@section('title', "Đơn hàng")

@section('title-page', "Đơn hàng")
@section('single-page', "Thêm đơn hàng")

@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           
            <h2 class="text-center  ">Thêm đơn hàng</h2>
                <input type="text" id="search_product" class="form-control mb-3" placeholder="Tìm hàng hóa">
                <div  class="mt-2">
                    <form action="" id="search-results">
                        
                    </form>
                </div>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên Hàng</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Thành Tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                 @if (session()->has('order'))
                 <?php
                 $order = session('order');
               ?>
                 @foreach ( $order as  $order_detail)
                 <tr>
                    {{dd($order_detail)}}
                     <td>Giày nữ màu xanh bóng</td>
                     <td>Đỏ</td>
                     <td>XL</td>
                     <td><input type="number" class="form-control" value="{{$order_detail['quantity']}}"></td>
                     <td>1,995,000 ₫</td>
                     <td>1,995,000 ₫</td>
                     <td><i class="fas fa-trash-alt text-danger"></i></td>
                 </tr>
                 @endforeach
                 @else

                 @endif
                </tbody>
            </table>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user"></i> Người gửi
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="senderName" class="form-label">Tên người gửi:</label>
                                <input type="text" class="form-control" id="senderName" value="Datch Fashion" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="senderPhone" class="form-label">Số điện thoại:</label>
                                <input type="text" class="form-control" id="senderPhone" value="0339381785" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="senderAddress" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" id="senderAddress" value="Ahihi Express" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user"></i> Người nhận
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="receiverName" class="form-label">Tên người nhận:</label>
                                <input type="text" class="form-control" id="receiverName" placeholder="Nhập tên người nhận">
                            </div>
                            <div class="mb-3">
                                <label for="receiverPhone" class="form-label">Số điện thoại:</label>
                                <input type="text" class="form-control" id="receiverPhone" placeholder="SĐT người nhận">
                            </div>
                            <div class="mb-3">
                                <label for="receiverAddress" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" id="receiverAddress" placeholder="Nhập địa chỉ người nhận">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Thông tin quốc phí
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="payer" class="form-label">Người T.T:</label>
                            <select class="form-select" id="payer">
                                <option>Người gửi</option>
                                <option>Người nhận</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="paymentMethod" class="form-label">Hình thức T.T:</label>
                            <select class="form-select" id="paymentMethod">
                                <option>Trả trước</option>
                                <option>Trả sau</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="codAmount" class="form-label">Tiền COD:</label>
                            <input type="text" class="form-control" id="codAmount" value="0">
                        </div>
                        <div class="col-md-3">
                            <label for="deliveryUnit" class="form-label">Chọn bưu cục lấy hàng:</label>
                            <select class="form-select" id="deliveryUnit">
                                <option>Bưu cục Hà Nội</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success me-2">Tạo đơn hàng</button>
                        <button class="btn btn-danger">Hủy bỏ</button>
                    </div>
                </div>
            </div>
            
        </div>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
</div>





@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#search_product').on('keyup', function() {
            let query = $(this).val();

            if (query.length >= 1) {
                $.ajax({
                    url: '{{ route("search.products") }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#search-results').empty();
                        if (data.length > 0) {
                 
                            $.each(data, function(index, variant) {
                                console.log(variant);
                                $('#search-results').append(`
                                
                                
                                    <div class="product-container" data-id="${variant.id}"> 
                                     
                                        <img src="${variant.image}" alt="Image product" width="70" class="product-image">
                                        <div class="product-details">
                                            <span class="product-name">${variant.product.name}</span> 
                                            <span class="product-code">Mã : ${variant.product.code}</span>
                                            <span class="product-color"> Màu sắc: ${variant.color.name}</span>
                                            <span class="product-size">Size :${variant.size.name}</span>
                                        </div>
                                    </div>
                                   
                                `);
                            });
                        } else {
                            $('#search-results').append('<p class="text-danger">Không tìm thấy sản phẩm nào.</p>');
                        }
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
    });

    // Hành động add sản phẩm biến thể vào trong đơn hàng

    $(document).on('click', '.product-container', function(){
        var variant_id = $(this).data('id');
        var product_code = $(this).data('product.name');

    $.ajax({
        url: '{{route('orders.add_product_order')}}',
        method: 'POST',
        data: {
            variant_id :variant_id,
            code: product_code, 
            quantity: 1
        },
        success: function(response) {
            // Hiển thị thông báo thành công
            alert(response.message);
            // Bạn có thể cập nhật giao diện giỏ hàng ở đây nếu cần
        },
        error: function(xhr) {
            alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
        }
    })    ;
    });
</script>
   
@endsection


@section('style')
<style>
    .product-container {
             display: flex;
             align-items: center;
             padding: 10px;
         }
         .product-image {
             width: 50px;
             height: 50px;
             margin-right: 10px;
         }
         .product-details {
             display: flex;
             flex-direction: column;
         }
         .product-name {
             font-size: 16px;
             font-weight: bold;
         }
         .product-code {
             font-size: 14px;
             color: #333;
         }
   </style>
@endsection