@extends('Client.layout.layout')

@section('title', "Trang chủ")


@section('content')


<div class="container flex mx-auto flex">
    <div class="mb-5">
        <ul class="flex container mx-auto pt-2 pb-2 text-sm">
            <li>
                <a class="hover:underline cursor-pointer" href="/">
                    Datch Fashion
                </a>
            </li>
            <li>
                <span class="mx-4">&gt;</span>
                <a class="hover:underline cursor-pointer" href="#">Kết quả tìm thấy cho {{ $query ?? 'Search Results' }}</a>
            </li>
        </ul>
        <p class="text-sm pt-2">

            {{ $totalResults }} Sản phẩm
        </p>
    </div>
</div>


@endsection


<script>
    $(document).ready(function() {
        $('#categorySelect').on('change', function() {
            let categoryId = $(this).val();

            $.ajax({
                url: "{{ route('products.filter') }}",
                type: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(products) {
                    let productHtml = '';

                    if (products.length > 0) {
                        products.forEach(product => {
                            productHtml += `<div class="product">
                                <h4>${product.name}</h4>
                                <p>Price: ${product.variants.length > 0 ? product.variants[0].price : 'N/A'}</p>
                            </div>`;
                        });
                    } else {
                        productHtml = '<p>No products found for this category.</p>';
                    }

                    $('#productList').html(productHtml);
                }
            });
        });
    });
</script>