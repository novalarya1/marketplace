<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function created(Order $order)
    {
        // Logika ketika order pertama dibuat
    }

    public function updated(Order $order)
    {
        // Misalnya update status => kirim notifikasi
    }

    public function boot()
    {
        Order::observe(\App\Observers\OrderObserver::class);
    }
}
