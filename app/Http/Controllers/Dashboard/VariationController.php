<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\VariationRequest;
use App\Models\Variation;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VariationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * VariationController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Variation::class, 'variation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variation::filter()->latest()->paginate();

        return view('dashboard.variations.index', compact('variations'));
    }

    public function getVariationsByAttribute(Request $request)
    {
        $variations = Variation::where('attribute_id', $request->attribute_id)
            ->with('translations')
            ->get()
            ->map(fn($v) => [
                'id' => $v->id,
                'name' => $v->name,
            ]);

        return response()->json($variations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Attribute $attribute)
    {
        return view('dashboard.variations.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\VariationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VariationRequest $request,Attribute $attribute)
    {
        $request->merge(['attribute_id' => $attribute->id]);
        $variation = Variation::create($request->all());

        flash()->success(trans('variations.messages.created'));

        return redirect()->route('dashboard.attributes.show', $variation->attribute);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        return view('dashboard.variations.show', compact('variation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(Variation $variation)
    {
        return view('dashboard.variations.edit', compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\VariationRequest $request
     * @param \App\Models\Variation $variation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VariationRequest $request, Variation $variation)
    {
        $variation->update($request->all());

        flash()->success(trans('variations.messages.updated'));

        return redirect()->route('dashboard.attributes.show', $variation->attribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Variation $variation
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Variation $variation)
    {
        $variation->delete();

        flash()->success(trans('variations.messages.deleted'));

        return redirect()->route('dashboard.variations.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Variation::class);

        $variations = Variation::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.variations.trashed', compact('variations'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Variation $variation)
    {
        $this->authorize('viewTrash', $variation);

        return view('dashboard.variations.show', compact('Variation'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Variation $variation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Variation $variation)
    {
        $this->authorize('restore', $variation);

        $variation->restore();

        flash()->success(trans('variations.messages.restored'));

        return redirect()->route('dashboard.variations.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Variation $variation
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Variation $variation)
    {
        $this->authorize('forceDelete', $variation);

        $variation->forceDelete();

        flash()->success(trans('variations.messages.deleted'));

        return redirect()->route('dashboard.variations.trashed');
    }
}
