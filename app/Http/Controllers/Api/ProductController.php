<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\ProductResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $products = Product::filter()->simplePaginate();

        return ProductResource::collection($products);
    }

    /**
     * Display the specified product.
     *
     * @param \App\Models\Product $product
     * @return \App\Http\Resources\ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $products = Product::filter()->simplePaginate();

        return SelectResource::collection($products);
    }
}
