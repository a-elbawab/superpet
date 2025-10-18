<?php

namespace App\Http\Controllers\Dashboard;

use App\Imports\ProductImport;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = [];
        // Iterate through sheets
        // $array = Excel::toCollection(new ProductImport(), public_path('products.xlsx'));
        // foreach ($array as $cheets => $cheet) {
        //     foreach ($cheet as $key => $value) {
        //         // dd($key, $value);
        //         if ($key > 0) {
        //             if((string) $value[10] == '717'){
        //                 // dd($value);
        //             }
        //             $products[] = [
        //                 // 'title' => $value[0],
        //                 'name' => [
        //                     'en' => $value[8],
        //                     'ar' => $value[6],
        //                 ],
        //                 'category' => $value[7],
        //                 'code' => (string) $value[10],
        //             ];
        //         }
        //     }
        // }

        // dd($products);

        // foreach ($products as $product) {
        //     Product::create($product);
        // }
        // dd('DONE');

        if (count(request()->except('page')) > 0) {
            $products = Product::withCount('products')->filter()->latest()->paginate();
        } else {
            $products = Product::parents()->withCount('products')->filter()->latest()->paginate();
        }

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $attributes = Attribute::with('translations')->get()->map(fn($a) => ['id' => $a->id, 'name' => $a->name]);

        $parent = Product::find(request('product_id'));
        $categories = Category::all()
            ->each(function ($category) {
                $category->custom_text = $category->tree . ' (' . $category->depth . ')';
            })->pluck('custom_text', 'id');

        return view('dashboard.products.create', compact('categories', 'parent', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {

        $raw = $request->input('parent', 0);
        $isParent = in_array((string) $raw, ['1', 1, true, 'true'], true);

        if ($isParent) {
            $request->merge([
                'selected_attributes' => [],
                'combinations' => [],
                'combinations_json' => '[]',
            ]);
        }

        $product = Product::create($request->all());
        $product->addAllMediaFromTokens($request->input('images'));
        $product->addAllMediaFromTokens($request->input('main_image'));

        foreach (array_keys($request->input('combinations', [])) as $index) {
            $combination = $request->input("combinations.$index");
            $file = $request->file("combinations.$index.image");

            $ids = $combination['value_ids'] ?? [];
            if (empty($ids))
                continue;

            sort($ids);
            $key = implode('-', $ids);
            if (isset($uniqueCombinations[$key]))
                continue;
            $uniqueCombinations[$key] = true;

            $variantModel = $product->variations()->create([
                'variation_id' => $ids[0],
                'combination' => $ids,
                'price_override' => $combination['price'] ?? 0,
                'quantity' => $combination['stock'] ?? 0,
            ]);

            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $variantModel->addMedia($file)->toMediaCollection('image');
            } elseif (!empty($combination['existing_media_id'])) {
                $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::find($combination['existing_media_id']);
                if ($media) {
                    $media->copy($variantModel, 'image');
                }
            }
        }

        flash()->success(trans('products.messages.created'));

        return redirect()->route('dashboard.products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category_products = $product->categoryProducts()->filter()->latest()->paginate();
        $products = $product->products()->filter()->latest()->paginate();
        return view('dashboard.products.show', compact('product', 'products', 'category_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $attributes = Attribute::with('translations')->get()->map(fn($a) => ['id' => $a->id, 'name' => $a->name]);

        $attributeVariations = Variation::with('translations')->get()->groupBy('attribute_id')->map(function ($group) {
            return $group->map(fn($v) => ['id' => $v->id, 'name' => $v->name]);
        });

        $categories = Category::whereNull('parent_id')->get()->pluck('name', 'id')->toArray();
        $parent = $product->parent;
        $subCategories = Category::where('parent_id', $product->category_id)->get()->pluck('name', 'id')->toArray();
        $subCategories2 = Category::where('parent_id', $product->sub_category_id)->get()->pluck('name', 'id')->toArray();

        return view('dashboard.products.edit', compact('product', 'categories', 'parent', 'subCategories', 'subCategories2', 'attributes', 'attributeVariations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\ProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->filled('combinations_json')) {
            $decodedCombinations = json_decode($request->input('combinations_json'), true);
            $finalCombinations = [];

            foreach ($decodedCombinations as $i => $combo) {
                $combo['image'] = $request->file("combinations.$i.image"); // صورة مرفوعة
                $finalCombinations[] = $combo;
            }

            $request->merge(['combinations' => $finalCombinations]);
        }

        $product->update($request->all());
        $product->addAllMediaFromTokens($request->input('images'));
        $product->addAllMediaFromTokens($request->input('main_image'));
        $product->tags()->sync(request('tags'));

        $submittedCombinations = $request->input('combinations', []);
        $existingVariations = $product->variations()->get()->keyBy(function ($v) {
            $ids = $v->combination ?? [];
            sort($ids);
            return implode('-', $ids);
        });

        $seenKeys = [];

        foreach ($submittedCombinations as $index => $combination) {
            $ids = $combination['value_ids'] ?? [];
            if (empty($ids))
                continue;

            sort($ids);
            $key = implode('-', $ids);
            $seenKeys[] = $key;

            $file = $request->file("combinations.$index.image");

            if (isset($existingVariations[$key])) {
                // تحديث موجود
                $variantModel = $existingVariations[$key];
                $variantModel->update([
                    'price_override' => $combination['price'] ?? 0,
                    'quantity' => $combination['stock'] ?? 0,
                ]);

                // حذف الصورة
                if (!empty($combination['remove_image'])) {
                    $variantModel->clearMediaCollection('image');
                }

                // صورة جديدة
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $variantModel->clearMediaCollection('image');
                    $variantModel->addMedia($file)->toMediaCollection('image');
                }
            } else {
                // جديد
                $variantModel = $product->variations()->create([
                    'variation_id' => $ids[0],
                    'combination' => $ids,
                    'price_override' => $combination['price'] ?? 0,
                    'quantity' => $combination['stock'] ?? 0,
                ]);

                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $variantModel->addMedia($file)->toMediaCollection('image');
                } elseif (!empty($combination['existing_media_id'])) {
                    $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::find($combination['existing_media_id']);
                    if ($media) {
                        $media->copy($variantModel, 'image');
                    }
                }
            }
        }

        // حذف الـ variations اللي ما اتبعتتش
        foreach ($existingVariations as $key => $variation) {
            if (!in_array($key, $seenKeys)) {
                $variation->delete();
            }
        }

        flash()->success(trans('products.messages.updated'));

        return redirect()->route('dashboard.products.show', $product);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $page = request('page', 1);
        $perPage = request('per_page', 15);

        $totalCount = Product::parents()->count();
        $lastPage = max(1, ceil($totalCount / $perPage));

        $page = min($page, $lastPage);

        flash()->success(trans('products.messages.deleted'));

        return redirect()->route('dashboard.products.index', [
            'page' => $page,
            'per_page' => $perPage,
        ]);
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Product::class);

        $products = Product::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.products.trashed', compact('products'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Product $product)
    {
        $this->authorize('viewTrash', $product);
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        $this->authorize('restore', $product);

        $product->restore();

        flash()->success(trans('products.messages.restored'));

        return redirect()->route('dashboard.products.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Product $product)
    {
        $this->authorize('forceDelete', $product);

        $product->forceDelete();

        flash()->success(trans('products.messages.deleted'));

        return redirect()->route('dashboard.products.trashed');
    }

    public function deleteMedia(\Spatie\MediaLibrary\MediaCollections\Models\Media $media)
    {
        $media->delete();

        return response()->json(['status' => 'deleted']);
    }

}
