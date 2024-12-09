
</div>
</main>
<div class="fixed-plugin">
<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
  <i class="fa fa-cog py-2"> </i>
</a>
<div class="card shadow-lg">
  <div class="card-header pb-0 pt-3 ">
    <div class="float-start">
      <h5 class="mt-3 mb-0">Argon Configurator</h5>
      <p>See our dashboard options.</p>
    </div>
    <div class="float-end mt-4">
      <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
        <i class="fa fa-close"></i>
      </button>
    </div>
    <!-- End Toggle Button -->
  </div>
  <hr class="horizontal dark my-1">
  <div class="card-body pt-sm-3 pt-0 overflow-auto">
    <!-- Sidebar Backgrounds -->
    <div>
      <h6 class="mb-0">Sidebar Colors</h6>
    </div>
    <a href="javascript:void(0)" class="switch-trigger background-color">
      <div class="badge-colors my-2 text-start">
        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
      </div>
    </a>
    <!-- Sidenav Type -->
    <div class="mt-3">
      <h6 class="mb-0">Sidenav Type</h6>
      <p class="text-sm">Choose between 2 different sidenav types.</p>
    </div>
    <div class="d-flex">
      <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
      <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
    </div>
    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
    <!-- Navbar Fixed -->
    <div class="d-flex my-3">
      <h6 class="mb-0">Navbar Fixed</h6>
      <div class="form-check form-switch ps-0 ms-auto my-auto">
        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
      </div>
    </div>
    <hr class="horizontal dark my-sm-4">
    <div class="mt-2 mb-5 d-flex">
      <h6 class="mb-0">Light / Dark</h6>
      <div class="form-check form-switch ps-0 ms-auto my-auto">
        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
      </div>
    </div>
    <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
    <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
    <div class="w-100 text-center">
      <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
      <h6 class="mt-3">Thank you for sharing!</h6>
      <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
      </a>
      <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
      </a>
    </div>
  </div>
</div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script>
var ctx1 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
new Chart(ctx1, {
  type: "line",
  data: {
    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Mobile apps",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#5e72e4",
      backgroundColor: gradientStroke1,
      borderWidth: 3,
      fill: true,
      data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
      maxBarThickness: 6

    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#fbfbfb',
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#ccc',
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
</script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/admin/js/argon-dashboard.min.js?v=2.0.4')}}"></script>

<!-- Morris -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!-- date -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.3/perfect-scrollbar.min.js"></script>
<script src="path/to/argon-dashboard.min.js?v=2.0.4"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      prevText : "Tháng trước",
      nextText : "Tháng sau",
      dateformat : "yy-mm-dd",
      dayNamesMin : ["Thứ 2" , "Thứ 3" , "Thứ 4" , "Thứ 5" , "Thứ 6" , "Thứ 7" , "Chủ Nhật"],
      duration : "slow"
    });

    $( "#datepicker2" ).datepicker({
      prevText : "Tháng trước",
      nextText : "Tháng sau",
      dateformat : "yy-mm-dd",
      dayNamesMin : ["Thứ 2" , "Thứ 3" , "Thứ 4" , "Thứ 5" , "Thứ 6" , "Thứ 7" , "Chủ Nhật"],
      duration : "slow"
    });
  } );
  </script>

<script >
  $(document).ready(function(){


      chart30daysorder(); 

      var chart = new Morris.Bar({
      element:'mychart',
      barColors : ['#819C79' , '#fc8710' , '#FF6541' , '#FF5733'],

      pointFillColors : ['#ffffff'],
      ponintStrokeColors : ['black'],
        fillOpacity: 0.6,
        hideHower : 'auto',
        parseTime : false,
      xkey: 'period',
      ykeys: ['order','total_price','quantity'],
      behaveLikeBar : true,
      labels: ['đơn hàng','Tổng số tiền','số lượng',]
    });

    // Lọc 30 ngày
    function chart30daysorder() {
    var _token = $('input[name="_token"]').val();

    $.ajax({
    url: "{{ route('admin.day-sorder') }}",
    method: "POST",
    dataType: "JSON",
    data: {
      _token: _token 
    },
    success: function(data) {
      chart.setData(data);
    },
    error: function(xhr, status, error) {
      console.error("Có lỗi khi gọi API:", error);
      alert("Có lỗi xảy ra khi lấy dữ liệu.");
    }
  });
}

$('.dashboard-filter').change(function() {
    var dashboard_value = $(this).val();
    var _token = $('input[name="_token"]').val();
 
    if (!dashboard_value) {
        alert('Vui lòng chọn giá trị để lọc.');
        return;
    }

    $.ajax({
        url: "{{ route('admin.db_filter') }}", 
        method: "POST",  
        dataType: "JSON", 
        data: { 
            dashboard_value: dashboard_value, 
            _token: _token 
        },
        success: function(data) {
            var tableBody = $("#orderTable tbody");
            tableBody.empty();
            if (data.length > 0) {
                data.forEach(function(order) {
                    var row = `
                        <tr>
                            <td>${order.period}</td>
                            <td>${order.order_count}</td>
                            <td>${order.quantity}</td>
                            <td>${order.total_price.toLocaleString()}</td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            } else {
                tableBody.append('<tr><td colspan="4" class="text-center">Không có đơn hàng trong khoảng thời gian này.</td></tr>');
            }
            chart.setData(data);
        },
        error: function(xhr, status, error) {
            alert('Có lỗi xảy ra. Vui lòng thử lại!');
        }
    });
  });

    $('#btn-dashboard-filter').click(function(){
      var _token = $('input[name = "_token"]').val();
      var from_date = $('#datepicker').val();
      var to_date = $('#datepicker2').val();
      $.ajax({
        url : "{{ route('admin.filter') }} ",
        method : "POST",
        dataType : "JSON",
        data : {from_date:from_date,to_date:to_date,_token:_token},

        success:function(data){
          chart.setData(data);
        }
      });
    });


  });
</script>

<!-- Thống kê doanh số -->
<script>
 $(document).ready(function() {
        $("#btn-dashboard-filter").click(function() {
            let fromDate = $("#datepicker").val();
            let toDate = $("#datepicker2").val();

            if (!fromDate || !toDate) {
                alert('Vui lòng chọn đầy đủ ngày bắt đầu và ngày kết thúc.');
                return;
            }

            $.ajax({
                url: '{{ route("admin.filter") }}',
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    from_date: fromDate,
                    to_date: toDate
                },
                success: function(response) {
                    let tableBody = $("#orderTable tbody");
                    tableBody.empty();

                    if (response.length > 0) {
                        response.forEach(function(order) {
                            let row = `
                                <tr>
                                    <td>${order.period}</td>
                                    <td>${order.order_count}</td>
                                    <td>${order.quantity}</td>
                                    <td>${order.total_price.toLocaleString()}</td>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="4">Không có đơn hàng trong khoảng thời gian này.</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại!');
                }
            });
        });
    });
</script>


<!-- Kết thúc js thống kê doanh số -->
<script>
  $(document).ready(function(){
    $('#btn-topProduct').on('click', function() {
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();

        if (!from_date || !to_date) {
            alert('Vui lòng chọn từ ngày và đến ngày!');
            return;
        }

        $.ajax({
            url: '{{ route('admin.topproduct') }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                from_date: from_date,
                to_date: to_date
            },
            success: function(response) {
                var chartData = response.map(function(product) {
                    return {
                        product_name: product.product_name,
                        quantity_sold: product.quantity_sold,
                        total_sales: product.total_sales,
                        average_price: product.average_price 
                    };
                });

                var chart = new Morris.Bar({
                    element: 'topProduct',
                    data: chartData, 
                    barColors: ['#819C79', '#fc8710', '#FF6541', '#FF5733'],
                    pointFillColors: ['#ffffff'], 
                    pointStrokeColors: ['black'],
                    fillOpacity: 0.6, 
                    hideHover: 'auto', 
                    parseTime: false,
                    xkey: 'product_name',
                    ykeys: ['quantity_sold', 'total_sales', 'average_price'],
                    behaveLikeBar: true,
                    labels: ['Số lượng đã bán', 'Tổng doanh thu', 'Giá bán'],
                });
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra! Vui lòng thử lại.');
            }
        });
    });
});
 </script>
 
<script>

  
  $('#btn-topProduct').on('click', function() {
    var from_date = $('#datepicker').val();
    var to_date = $('#datepicker2').val();

    // Kiểm tra xem ngày tháng đã được chọn chưa
    if (!from_date || !to_date) {
        alert('Vui lòng chọn từ ngày và đến ngày!');
        return;
    }

    // Gửi yêu cầu AJAX tới controller
    $.ajax({
        url: '{{ route('admin.topproduct') }}', // Đảm bảo đường dẫn đúng
        type: 'POST', // Sử dụng phương thức POST
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // Lấy CSRF token từ meta tag
            from_date: from_date,
            to_date: to_date
        },
        success: function(response) {
            // Xử lý kết quả và hiển thị trong bảng
            $('#topProductTable tbody').empty(); // Xóa các hàng cũ trong bảng
            if (response.length === 0) {
                $('#topProductTable tbody').append('<tr><td colspan="4">Không có sản phẩm nào trong khoảng thời gian này.</td></tr>');
            } else {
                response.forEach(function(product) {
                    var row = `
                        <tr>
                            <td>${product.product_name}</td>
                            <td>${product.quantity_sold}</td>
                            <td>${new Intl.NumberFormat().format(product.average_price)} VND</td> <!-- Hiển thị giá trung bình -->
                            <td>${new Intl.NumberFormat().format(product.total_sales)} VND</td>
                        </tr>
                    `;
                    $('#topProductTable tbody').append(row);
                });
            }
        },
        error: function(xhr, status, error) {
            alert('Có lỗi xảy ra! Vui lòng thử lại.');
        }
    });
});
</script>
<!-- Kết thúc thống kê 10 sản phẩm bán chạy nhất -->
<script>
  $(document).ready(function() {
    $('#btn-orderStatus').on('click', function() {
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();

        if (!from_date || !to_date) {
            alert('Vui lòng chọn khoảng thời gian!');
            return;
        }

        $.ajax({
            url: '{{ route('admin.statusOrder') }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                from_date: from_date,
                to_date: to_date
            },
            success: function(response) {
                if (response.length === 0) {
                    alert('Không có đơn hàng trong khoảng thời gian này!');
                    return;
                }

                $('#orderStatus tbody').empty();

                response.forEach(function(order) {
                    var row = `
                        <tr>
                            <td>${order.order_date}</td>
                            <td>${order.product_name}</td>
                            <td>${order.order_status}</td>
                            <td>${order.payment}</td>
                            <td>${order.payment_status}</td>
                        </tr>
                    `;
                    $('#orderStatus tbody').append(row); 
                });
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra, vui lòng thử lại!');
            }
        });
    });
});
</script>
<!-- Kết thúc thống kê đơn hàng theo trạng thái -->

<script>
  $(document).ready(function(){
    $('#btn-stockStatus').on('click', function() {
    var from_date = $('#datepicker').val();
    var to_date = $('#datepicker2').val();

    // Kiểm tra nếu người dùng không chọn ngày
    if (!from_date || !to_date) {
        alert('Vui lòng chọn từ ngày và đến ngày!');
        return;
    }

    // Gửi yêu cầu AJAX
    $.ajax({
        url: '{{ route('admin.inventori') }}',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            from_date: from_date,
            to_date: to_date
        },
        success: function(response) {
            // Xử lý dữ liệu trả về
            var chartData = response.map(function(product) {
                return {
                    product_name: product.product_name,
                    quantity: product.quantity, 
                    price: product.price
                };
            });

            // Tạo biểu đồ với Morris.Bar
            new Morris.Bar({
                element: 'myInventori',  // ID của phần tử chứa biểu đồ
                data: chartData,  // Dữ liệu cho biểu đồ
                barColors: ['#819C79', '#fc8710', '#FF6541'],  // Màu sắc các cột
                pointFillColors: ['#ffffff'], 
                pointStrokeColors: ['black'],
                fillOpacity: 0.6, 
                hideHover: 'auto', 
                parseTime: false,  // Không phân tích thời gian
                xkey: 'product_name',  // Dữ liệu cho trục X
                ykeys: ['quantity', 'price'],  // Dữ liệu cho trục Y (chỉ có số liệu)
                labels: ['Số lượng tồn kho', 'Giá'],  // Nhãn cho các trục Y
            });
        },
        error: function(xhr, status, error) {
            alert('Có lỗi xảy ra! Vui lòng thử lại.');
        }
    });
});

});

</script>

<script>
  $(document).ready(function(){
    $('#btn-stockStatus').on('click', function() {
        var from_date = $('#datepicker').val(); 
        var to_date = $('#datepicker2').val(); 

        if (!from_date || !to_date) {
            alert('Vui lòng chọn từ ngày và đến ngày!');
            return;
        }

        $.ajax({
            url: '{{ route('admin.inventori') }}', 
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                from_date: from_date,
                to_date: to_date
            },
            success: function(response) {
                if (response.length === 0) {
                    alert('Không có dữ liệu tồn kho trong khoảng thời gian này!');
                    return;
                }

                $('#stockStatus tbody').empty();

                response.forEach(function(stock) {
                    var row = '<tr>';
                    row += '<td>' + stock.product_name + '</td>';
                    row += '<td>' + stock.quantity + '</td>';
                    row += '<td>' + stock.price + '</td>'; 
                    row += '<td>' + stock.size + '</td>'; 
                    row += '<td>' + stock.color + '</td>'; 
                    row += '</tr>';
                    $('#stockStatus tbody').append(row); 
                });
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra! Vui lòng thử lại.');
            }
        });
    });
});

</script>
@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: '{{ session('error') }}',
        showConfirmButton: true,
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false,
    });
</script>
@endif

@if (session('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Cảnh báo',
        text: '{{ session('warning') }}',
        showConfirmButton: true,
    });
</script>
@endif
</body>

</html>
