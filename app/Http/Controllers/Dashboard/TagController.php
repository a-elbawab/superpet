<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\TagRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TagController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::filter()->latest()->paginate();

        return view('dashboard.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $request->merge(['slug' => $request->name]);
        $tag = Tag::create($request->all());

        flash()->success(trans('tags.messages.created'));

        return redirect()->route('dashboard.tags.show', $tag);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('dashboard.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TagRequest $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());

        flash()->success(trans('tags.messages.updated'));

        return redirect()->route('dashboard.tags.show', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        flash()->success(trans('tags.messages.deleted'));

        return redirect()->route('dashboard.tags.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Tag::class);

        $tags = Tag::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.tags.trashed', compact('tags'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Tag $tag)
    {
        $this->authorize('viewTrash', $tag);

        return view('dashboard.tags.show', compact('tag'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Tag $tag)
    {
        $this->authorize('restore', $tag);

        $tag->restore();

        flash()->success(trans('tags.messages.restored'));

        return redirect()->route('dashboard.tags.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Tag $tag)
    {
        $this->authorize('forceDelete', $tag);

        $tag->forceDelete();

        flash()->success(trans('tags.messages.deleted'));

        return redirect()->route('dashboard.tags.trashed');
    }
}
