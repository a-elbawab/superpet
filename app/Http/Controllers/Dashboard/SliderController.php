<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\SliderRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SliderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * SliderController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Slider::class, 'slider');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::filter()->latest()->paginate();

        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SliderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->all());
        $slider->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('sliders.messages.created'));

        return redirect()->route('dashboard.sliders.show', $slider);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('dashboard.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\SliderRequest $request
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $slider->update($request->all());
        $slider->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('sliders.messages.updated'));

        return redirect()->route('dashboard.sliders.show', $slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Slider $slider
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        flash()->success(trans('sliders.messages.deleted'));

        return redirect()->route('dashboard.sliders.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Slider::class);

        $sliders = Slider::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.sliders.trashed', compact('sliders'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Slider $slider)
    {
        $this->authorize('viewTrash', $slider);

        return view('dashboard.sliders.show', compact('slider'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Slider $slider)
    {
        $this->authorize('restore', $slider);

        $slider->restore();

        flash()->success(trans('sliders.messages.restored'));

        return redirect()->route('dashboard.sliders.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Slider $slider
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Slider $slider)
    {
        $this->authorize('forceDelete', $slider);

        $slider->forceDelete();

        flash()->success(trans('sliders.messages.deleted'));

        return redirect()->route('dashboard.sliders.trashed');
    }
}
