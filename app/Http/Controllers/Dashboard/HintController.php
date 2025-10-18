<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Hint;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\HintRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HintController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * HintController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Hint::class, 'hint');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hints = Hint::filter()->latest()->paginate();

        return view('dashboard.hints.index', compact('hints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\HintRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HintRequest $request)
    {
        $hint = Hint::create($request->all());

        flash()->success(trans('hints.messages.created'));

        return redirect()->route('dashboard.hints.show', $hint);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hint $hint
     * @return \Illuminate\Http\Response
     */
    public function show(Hint $hint)
    {
        return view('dashboard.hints.show', compact('hint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hint $hint
     * @return \Illuminate\Http\Response
     */
    public function edit(Hint $hint)
    {
        return view('dashboard.hints.edit', compact('hint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\HintRequest $request
     * @param \App\Models\Hint $hint
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HintRequest $request, Hint $hint)
    {
        $hint->update($request->all());

        flash()->success(trans('hints.messages.updated'));

        return redirect()->route('dashboard.hints.show', $hint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hint $hint
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Hint $hint)
    {
        $hint->delete();

        flash()->success(trans('hints.messages.deleted'));

        return redirect()->route('dashboard.hints.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Hint::class);

        $hints = Hint::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.hints.trashed', compact('hints'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Hint $hint
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Hint $hint)
    {
        $this->authorize('viewTrash', $hint);

        return view('dashboard.hints.show', compact('hint'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Hint $hint
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Hint $hint)
    {
        $this->authorize('restore', $hint);

        $hint->restore();

        flash()->success(trans('hints.messages.restored'));

        return redirect()->route('dashboard.hints.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Hint $hint
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Hint $hint)
    {
        $this->authorize('forceDelete', $hint);

        $hint->forceDelete();

        flash()->success(trans('hints.messages.deleted'));

        return redirect()->route('dashboard.hints.trashed');
    }

    public function done(Hint $hint)
    {
        $done = $hint->done ? false : true;

        $hint->update(['done' => $done]);
        return back();
    }
}
