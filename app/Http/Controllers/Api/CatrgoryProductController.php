<?php

namespace App\Http\Controllers\Api;

use App\Models\CategoryProduct;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\CategoryProductResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the category_products.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $category_products = CategoryProduct::filter()->simplePaginate();

        return CategoryProductResource::collection($category_products);
    }

    /**
     * Display the specified category_product.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @return \App\Http\Resources\CategoryProductResource
     */
    public function show(CategoryProduct $category_product)
    {
        return new CategoryProductResource($category_product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $category_products = CategoryProduct::filter()->simplePaginate();

        return SelectResource::collection($category_products);
    }
}
