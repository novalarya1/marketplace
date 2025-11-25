<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    protected $model = \App\Models\Wishlist::class;

    public function definition()
    {
        return [
            'user_id'    => User::factory(),
            'product_id' => Product::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
