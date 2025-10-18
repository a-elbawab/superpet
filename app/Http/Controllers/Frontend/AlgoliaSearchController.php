<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlgoliaSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $isArabic = preg_match('/[\x{0600}-\x{06FF}]/u', $query); // كشف اللغة
        $locale = $isArabic ? 'ar' : 'en';

        $products = Product::search($query)->get(); // مفيش تخصيص في البحث

        $products = collect($products)
            ->filter(fn($p) => $p->active && $p->name)->take(10);

        return response()->json(
            $products->map(function ($product) use ($locale) {

                $slug = optional($product->getTranslation($locale, true))->slug
                    ?? optional($product->getTranslation('en', true))->slug
                    ?? $product->id;

                return [
                    'id' => $product->id,
                    'name' => $product->getTranslation($locale, true)?->name, // حسب اللغة المكتشفة
                    'price' => $product->price ?? 0,
                    'image' => $product->main_image ?? asset('default-product.jpg'),
                    'url' => route('front.product', $slug),
                ];
            })->values()
        );
    }
}

