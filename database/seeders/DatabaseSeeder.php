<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Wishlist;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin (hindari duplikasi)
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => bcrypt('password'), // default password
            ]
        );

        // 2. Create Vendors
        $vendors = User::factory()->count(5)->create([
            'role' => 'vendor'
        ]);

        // 3. Create Customers
        $customers = User::factory()->count(10)->create([
            'role' => 'customer'
        ]);

        // 4. Create Categories
        $categories = Category::factory()->count(6)->create();

        // 5. Create Products for each vendor
        $vendors->each(function ($vendor) use ($categories) {
            Product::factory()
                ->count(10)
                ->for($vendor, 'vendor')   // pastikan relasi 'vendor' di Product model
                ->for($categories->random(), 'category') // relasi category
                ->create();
        });

        // 6. Create Reviews
        Review::factory()->count(40)->create();

        // 7. Create Orders with OrderItems for customers
        $customers->each(function ($customer) {
            Order::factory()
                ->count(3)
                ->for($customer)
                ->create()
                ->each(function ($order) {
                    OrderItem::factory()->count(2)->for($order)->create();
                });
        });

        // 8. Create Wishlist entries (user & product)
        $products = Product::all();
        $customers->each(function ($customer) use ($products) {
            Wishlist::factory()->count(3)->create([
                'user_id' => $customer->id,
                'product_id' => $products->random()->id,
            ]);
        });
    }
}
