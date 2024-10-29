<?php

namespace Database\Seeders;


use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        Product::query()->truncate();
        Color::query()->truncate();
        Size::query()->truncate();

        // Seeder bảng danh mục
        $categories = ['Nam', 'Nữ', 'Unisex'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'image' => fake()->imageUrl(200, 200),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Seeder bảng kích thước

        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        foreach ($sizes as $size) {
            DB::table('sizes')->insert([
                'name' => $size,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Seeder bảng màu sắc

        $colors = [
            ['name' => 'Đỏ', 'color_code' => '#FF0000'],
            ['name' => 'Xanh lá', 'color_code' => '#00FF00'],
            ['name' => 'Xanh dương', 'color_code' => '#0000FF'],
            ['name' => 'Vàng', 'color_code' => '#FFFF00'],
            ['name' => 'Đen', 'color_code' => '#000000'],
            ['name' => 'Trắng', 'color_code' => '#FFFFFF'],
            ['name' => 'Cam', 'color_code' => '#FFA500'],
            ['name' => 'Tím', 'color_code' => '#800080'],
            ['name' => 'Hồng', 'color_code' => '#FFC0CB'],
            ['name' => 'Lục lam', 'color_code' => '#00FFFF']
        ];

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color['name'],
                'color_code' => $color['color_code'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // seeder cho brand

        for ($i = 1; $i <= 10; $i++) {
            DB::table('brands')->insert([
                'name' => fake()->company,  
                'logo' => fake()->imageUrl(200, 200, 'business'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        //seeder bảng sản phẩm

        $categories = DB::table('categories')->pluck('id')->toArray();
        $brands = DB::table('brands')->pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $productName = fake()->text(100);  // Tạo tên sản phẩm ngẫu nhiên
            $slug = Str::slug($productName);  // Tạo slug từ tên sản phẩm

            DB::table('products')->insert([
                'code' => 'PROD' . '00-' . $i,  // Mã sản phẩm
                'name' => $productName,  // Tên sản phẩm
                'slug' => $slug,  // Slug được tạo từ tên sản phẩm
                'image' => fake()->imageUrl(400, 400, 'product'),  // URL hình ảnh ngẫu nhiên
                'description' => fake()->paragraph,  // Mô tả ngẫu nhiên
                'material' => fake()->word,  // Vật liệu ngẫu nhiên
                'status' => fake()->boolean,  // Trạng thái ngẫu nhiên
                'is_active' => fake()->boolean,  // Trạng thái kích hoạt ngẫu nhiên
                'category_id' => fake()->randomElement($categories),  // Lấy category_id ngẫu nhiên
                'brand_id' => fake()->randomElement($brands),  // Lấy brand_id ngẫu nhiên
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Seeder bảng product_gallery

        $products = DB::table('products')->pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('product_galleries')->insert([
                'image' => fake()->imageUrl(400, 400, 'product'),  
                'product_id' => fake()->randomElement($products), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        //seeder bảng product_variants

        $colors = DB::table('colors')->pluck('id')->toArray();
        $sizes = DB::table('sizes')->pluck('id')->toArray();

        // Tạo 10 bản ghi cho bảng product_variants
        for ($i = 1; $i <= 10; $i++) {
            DB::table('product_variants')->insert([
                'product_id' => fake()->randomElement($products),  
                'color_id' => fake()->randomElement($colors),      
                'size_id' => fake()->randomElement($sizes),
                'price' => $price = fake()->numberBetween(10000, 1000000),
                'sale_price' => round($price * 0.9, 2),
                'quantity' => fake()->numberBetween(1, 100),      
                'image' => fake()->imageUrl(400, 400, 'product'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
