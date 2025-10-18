<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\SectionRequest;
use App\Models\Service;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SectionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * SectionController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Section::class, 'section');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::filter()->latest()->paginate();

        return view('dashboard.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        return view('dashboard.sections.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SectionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SectionRequest $request)
    {
        $section = Section::create($request->all());

        flash()->success(trans('sections.messages.created'));

        return redirect()->route('dashboard.services.show', $section->service);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $inputs = $section->inputs()->orderBy('order')->paginate();
        return view('dashboard.sections.show', compact('section', 'inputs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('dashboard.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SectionRequest $request
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->all());

        flash()->success(trans('sections.messages.updated'));

        return redirect()->route('dashboard.sections.show', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Section $section
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section)
    {
        $section->delete();

        flash()->success(trans('sections.messages.deleted'));

        return redirect()->route('dashboard.sections.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Section::class);

        $sections = Section::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.sections.trashed', compact('sections'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Section $section)
    {
        $this->authorize('viewTrash', $section);

        return view('dashboard.sections.show', compact('section'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Section $section)
    {
        $this->authorize('restore', $section);

        $section->restore();

        flash()->success(trans('sections.messages.restored'));

        return redirect()->route('dashboard.sections.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Section $section
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Section $section)
    {
        $this->authorize('forceDelete', $section);

        $section->forceDelete();

        flash()->success(trans('sections.messages.deleted'));

        return redirect()->route('dashboard.sections.trashed');
    }
}
