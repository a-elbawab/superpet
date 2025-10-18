<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ShopController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function shop()
    {
        $title = "Shop Page";

        $userAgent = request()->header('User-Agent');

        $isMobile = preg_match('/Mobile|Android|iP(hone|od|ad)|Opera Mini|IEMobile/', $userAgent);

        $perPage = $isMobile ? 16 : 15;

        $categories = Category::parents()->active()->get();

        if (Category::where('id', request()->get('category_id'))->exists()) {
            $mainParentCategory = Category::find(request()->get('category_id'))->mainParent;

            $categories = $categories->filter(function ($category) use ($mainParentCategory) {
                return $category->id !== $mainParentCategory->id;
            });

            $categories->prepend($mainParentCategory);
        }

        if (request()->get('text')) {
            $products = Product::search(request()->get('text'))
                ->query(fn($q) => $q->website())->get();
            $products = collect($products)
                ->filter(fn($p) => $p->active && $p->name && $p->main_image)
                ->take($perPage);

        } else {
            $products = Product::active()
                ->filter()
                ->with('category')
                ->website()
                ->paginate($perPage)
                ->appends(request()->query());
        }

        $products = Product::active()->filter()
            ->with('category')->website()
            ->paginate($perPage)
            // append pagination links to the query string
            ->appends(request()->query());

        $top_products = Product::active()->withCount('invoices')->with('category')->orderBy('invoices_count', 'desc')->limit(5)->get();

        return view('frontend.shop', compact('title', 'categories', 'products', 'top_products'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function product(Product $product)
    {
        $title = $product->name;
        $tr = $product->translate(app()->getLocale(), true);
        $fallback = $product->translate('en', true);
        $metaDesc = $tr?->meta_description ?? \Illuminate\Support\Str::limit(strip_tags($tr?->description ?? $fallback?->description), 160);
        $metaKeys = $tr?->meta_keywords;

        $mainImageMedia = $product->main_image_media;
        $relatedProducts = Product::active()
        ->website()
        ->where('category_id', $product->category_id)
            ->where(function ($query) use ($product) {
                $query
                    ->orWhere('parent_id', $product->parent_id)
                    ->orWhere('sub_category_id', $product->sub_category_id);
            })
            ->where('id', '!=', $product->id)
            ->with('category')
            ->inRandomOrder()
            ->limit(6)->get();

        return view('frontend.product', compact('title', 'product', 'relatedProducts', 'mainImageMedia', 'metaDesc', 'metaKeys'));
    }
}
