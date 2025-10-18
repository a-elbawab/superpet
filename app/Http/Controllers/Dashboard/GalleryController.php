<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gallery;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\GalleryRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GalleryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * GalleryController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Gallery::class, 'gallery');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::filter()->latest()->paginate();

        return view('dashboard.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\GalleryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        $gallery->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('galleries.messages.created'));

        return redirect()->route('dashboard.galleries.show', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('dashboard.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\GalleryRequest $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        $gallery->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('galleries.messages.updated'));

        return redirect()->route('dashboard.galleries.show', $gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Gallery $gallery
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        flash()->success(trans('galleries.messages.deleted'));

        return redirect()->route('dashboard.galleries.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Gallery::class);

        $galleries = Gallery::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.galleries.trashed', compact('galleries'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Gallery $gallery)
    {
        $this->authorize('viewTrash', $gallery);

        return view('dashboard.galleries.show', compact('gallery'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Gallery $gallery)
    {
        $this->authorize('restore', $gallery);

        $gallery->restore();

        flash()->success(trans('galleries.messages.restored'));

        return redirect()->route('dashboard.galleries.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Gallery $gallery
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Gallery $gallery)
    {
        $this->authorize('forceDelete', $gallery);

        $gallery->forceDelete();

        flash()->success(trans('galleries.messages.deleted'));

        return redirect()->route('dashboard.galleries.trashed');
    }
}
