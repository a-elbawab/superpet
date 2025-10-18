<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\CategoryProductRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * CategoryProductController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(CategoryProduct::class, 'category_product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_products = CategoryProduct::filter()->latest()->paginate();

        return view('dashboard.category_products.index', compact('category_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()
            ->each(function ($category) {
                $category->custom_text = $category->tree . ' (' . $category->depth . ')';
            })->pluck('custom_text', 'id');

        return view('dashboard.category_products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\CategoryProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryProductRequest $request)
    {
        $category_product = CategoryProduct::create($request->all());

        flash()->success(trans('category_products.messages.created'));


        return redirect()->route('dashboard.products.show', $category_product->product);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $category_product)
    {
        return view('dashboard.category_products.show', compact('category_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $category_product)
    {
        $categories = Category::whereNull('parent_id')->get()->pluck('name', 'id')->toArray();
        $subCategories = Category::where('parent_id', $category_product->category_id)->get()->pluck('name', 'id')->toArray();
        $subCategories2 = Category::where('parent_id', $category_product->sub_category_id)->get()->pluck('name', 'id')->toArray();

        return view('dashboard.category_products.edit', compact('category_product', 'categories', 'subCategories', 'subCategories2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\CategoryProductRequest $request
     * @param \App\Models\CategoryProduct $category_product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryProductRequest $request, CategoryProduct $category_product)
    {
        $category_product->update($request->all());

        flash()->success(trans('category_products.messages.updated'));

        return redirect()->route('dashboard.products.show', $category_product->product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CategoryProduct $category_product)
    {
        $category_product->delete();

        flash()->success(trans('category_products.messages.deleted'));

        return redirect()->route('dashboard.products.show', $category_product->product);
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', CategoryProduct::class);

        $category_products = CategoryProduct::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.category_products.trashed', compact('category_products'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(CategoryProduct $category_product)
    {
        $this->authorize('viewTrash', $category_product);

        return view('dashboard.category_products.show', compact('category_product'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(CategoryProduct $category_product)
    {
        $this->authorize('restore', $category_product);

        $category_product->restore();

        flash()->success(trans('category_products.messages.restored'));

        return redirect()->route('dashboard.category_products.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\CategoryProduct $category_product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(CategoryProduct $category_product)
    {
        $this->authorize('forceDelete', $category_product);

        $category_product->forceDelete();

        flash()->success(trans('category_products.messages.deleted'));

        return redirect()->route('dashboard.category_products.trashed');
    }
}
