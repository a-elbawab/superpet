<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Input;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\InputRequest;
use App\Models\Section;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use PhpParser\Node\Stmt\Label;

class InputController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * InputController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Input::class, 'input');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = Input::filter()->latest()->paginate();

        return view('dashboard.inputs.index', compact('inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Section $section)
    {
        $order = Input::where('section_id', $section->id)->max('order') + 1;

        return view('dashboard.inputs.create', compact('section', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\InputRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InputRequest $request)
    {
        // Get order and name values from the request
        [$order, $name] = $this->getValues($request);

        // Shift existing inputs in the section if the specified order already exists
        Input::where('section_id', $request->section_id)
            ->where('order', '>=', $order)
            ->increment('order');

        // Merge the calculated order and name into the request data
        $request->merge(['order' => $order, 'name' => $name]);

        // Create the new input with adjusted order
        $input = Input::create($request->all());

        // Run setOrder to ensure orders are sequentially re-indexed
        $this->setOrder($input, true);

        flash()->success(trans('inputs.messages.created'));

        return redirect()->route('dashboard.sections.show', $input->section);
    }



    /**
     * Display the specified resource.
     *
     * @param \App\Models\Input $input
     * @return \Illuminate\Http\Response
     */
    public function show(Input $input)
    {
        $options = $input->options()->latest()->paginate();
        return view('dashboard.inputs.show', compact('input', 'options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Input $input
     * @return \Illuminate\Http\Response
     */
    public function edit(Input $input)
    {
        return view('dashboard.inputs.edit', compact('input'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\InputRequest $request
     * @param \App\Models\Input $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InputRequest $request, Input $input)
    {
        [$order, $name] = $this->getValues($request);
        $request->merge(['order' => $order, 'name' => $name]);

        $input->update($request->all());

        $this->setOrder($input);

        flash()->success(trans('inputs.messages.updated'));

        return redirect()->route('dashboard.sections.show', $input->section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Input $input
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Input $input)
    {
        $input->delete();

        flash()->success(trans('inputs.messages.deleted'));

        return redirect()->route('dashboard.inputs.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Input::class);

        $inputs = Input::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.inputs.trashed', compact('inputs'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Input $input
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Input $input)
    {
        $this->authorize('viewTrash', $input);

        return view('dashboard.inputs.show', compact('input'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Input $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Input $input)
    {
        $this->authorize('restore', $input);

        $input->restore();

        flash()->success(trans('inputs.messages.restored'));

        return redirect()->route('dashboard.inputs.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Input $input
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Input $input)
    {
        $this->authorize('forceDelete', $input);

        $input->forceDelete();

        flash()->success(trans('inputs.messages.deleted'));

        return redirect()->route('dashboard.inputs.trashed');
    }

    protected function getValues($request)
    {
        $name = preg_replace('/[^a-z0-9]/', '_', strtolower($request->input('label:en')));
        if (Input::where('section_id', $request->section_id)->where('name', $name)->exists()) {
            $name = $name . '1';
        }
        // Get the desired order from the request, or default to the next available order
        $order = $request->input('order') ?? Input::where('section_id', $request->section_id)->max('order') + 1;

        return [$order, $name];
    }

    protected function setOrder($input, $new = false)
    {
        // First, check if the order has changed
        if ($input->wasChanged('order') || $new) {
            // If the order is updated or it's a new input, shift the existing inputs
            if ($input->wasChanged('order')) {
                // Shift existing inputs after the specified order (increment)
                Input::where('section_id', $input->section_id)
                    ->where('id', '!=', $input->id)
                    ->where('order', '>=', $input->order)
                    ->increment('order');

                // Shift existing inputs before the specified order (decrement)
                Input::where('section_id', $input->section_id)
                    ->where('id', '!=', $input->id)
                    ->where('order', '<', $input->order)
                    ->decrement('order');
            }

            // Re-index all orders starting from 1 after the input is created or updated
            $this->reIndexOrders($input);
        }
    }

    protected function reIndexOrders($input)
    {
        // After adjusting the order, we need to reindex all orders starting from 1
        $inputs = Input::where('section_id', $input->section_id)
            ->orderBy('order')
            ->get();

        $order = 1;  // Start from 1
        foreach ($inputs as $input) {
            // Make sure the input order is unique
            $input->update(['order' => $order]);  // Set the new order
            $order++;  // Increment the order for the next input
        }
    }
}
