<?php

namespace App\Observers;

use App\Models\Category;
use Spatie\ResponseCache\Facades\ResponseCache;

class CategoryObserver
{
    public function created(Category $category)
    {
        ResponseCache::clear(); // عند إنشاء خدمة
    }

    public function updated(Category $category)
    {
        ResponseCache::clear(); // عند تحديث خدمة
    }

    public function deleted(Category $category)
    {
        ResponseCache::clear(); // عند حذف خدمة
    }
}