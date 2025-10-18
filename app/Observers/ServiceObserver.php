<?php

namespace App\Observers;

use App\Models\Service;
use Spatie\ResponseCache\Facades\ResponseCache;

class ServiceObserver
{
    public function created(Service $service)
    {
        ResponseCache::clear(); // عند إنشاء خدمة
    }

    public function updated(Service $service)
    {
        ResponseCache::clear(); // عند تحديث خدمة
    }

    public function deleted(Service $service)
    {
        ResponseCache::clear(); // عند حذف خدمة
    }
}