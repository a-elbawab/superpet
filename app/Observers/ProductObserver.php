<?php

namespace App\Observers;

use App\Models\Product;
use Spatie\ResponseCache\Facades\ResponseCache;

class ProductObserver
{
    public function created(Product $product)
    {
        ResponseCache::clear(); // عند إنشاء منتج
    }

    public function updated(Product $product)
    {
        ResponseCache::clear(); // عند تحديث منتج
    }

    public function deleted(Product $product)
    {
        ResponseCache::clear(); // عند حذف منتج
    }
}