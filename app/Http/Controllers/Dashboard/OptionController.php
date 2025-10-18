<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\OptionRequest;
use App\Models\Input;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OptionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * OptionController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Option::class, 'option');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::filter()->latest()->paginate();

        return view('dashboard.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Models\Input $input
     *
     * @return \Illuminate\Http\Response
     * */
    public function create(Input $input)
    {
        return view('dashboard.options.create', compact('input'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\OptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OptionRequest $request)
    {
        $option = Option::create($request->all());

        flash()->success(trans('options.messages.created'));

        return redirect()->route('dashboard.inputs.show', $option->input);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return view('dashboard.options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        return view('dashboard.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\OptionRequest $request
     * @param \App\Models\Option $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->all());

        flash()->success(trans('options.messages.updated'));

        return redirect()->route('dashboard.options.show', $option);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Option $option
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Option $option)
    {
        $option->delete();

        flash()->success(trans('options.messages.deleted'));

        return redirect()->route('dashboard.options.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Option::class);

        $options = Option::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.options.trashed', compact('options'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Option $option)
    {
        $this->authorize('viewTrash', $option);

        return view('dashboard.options.show', compact('option'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Option $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Option $option)
    {
        $this->authorize('restore', $option);

        $option->restore();

        flash()->success(trans('options.messages.restored'));

        return redirect()->route('dashboard.options.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Option $option
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Option $option)
    {
        $this->authorize('forceDelete', $option);

        $option->forceDelete();

        flash()->success(trans('options.messages.deleted'));

        return redirect()->route('dashboard.options.trashed');
    }
}
