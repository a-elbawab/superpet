<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Attribute;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\AttributeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttributeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * AttributeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Attribute::class, 'attribute');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::filter()->latest()->paginate();

        return view('dashboard.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\AttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributeRequest $request)
    {
        $attribute = Attribute::create($request->all());

        flash()->success(trans('attributes.messages.created'));

        return redirect()->route('dashboard.attributes.show', $attribute);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        $variations = $attribute->variations()->latest()->paginate();
        return view('dashboard.attributes.show', compact('attribute', 'variations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('dashboard.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\AttributeRequest $request
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->all());

        flash()->success(trans('attributes.messages.updated'));

        return redirect()->route('dashboard.attributes.show', $attribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attribute $attribute
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        flash()->success(trans('attributes.messages.deleted'));

        return redirect()->route('dashboard.attributes.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Attribute::class);

        $attributes = Attribute::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.attributes.trashed', compact('attributes'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Attribute $attribute)
    {
        $this->authorize('viewTrash', $attribute);

        return view('dashboard.attributes.show', compact('attribute'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Attribute $attribute)
    {
        $this->authorize('restore', $attribute);

        $attribute->restore();

        flash()->success(trans('attributes.messages.restored'));

        return redirect()->route('dashboard.attributes.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Attribute $attribute
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Attribute $attribute)
    {
        $this->authorize('forceDelete', $attribute);

        $attribute->forceDelete();

        flash()->success(trans('attributes.messages.deleted'));

        return redirect()->route('dashboard.attributes.trashed');
    }
}
