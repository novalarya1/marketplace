<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    public function update(User $user, Product $product)
    {
        return $user->role === 'vendor' && $product->user_id === $user->id;
    }

    public function delete(User $user, Product $product)
    {
        return $user->role === 'vendor' && $product->user_id === $user->id;
    }
}
