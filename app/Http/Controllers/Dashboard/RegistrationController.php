<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Registration;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\RegistrationRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegistrationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * RegistrationController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Registration::class, 'registration');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::filter()->latest()->paginate();

        return view('dashboard.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegistrationRequest $request)
    {
        $registration = Registration::create($request->all());

        flash()->success(trans('registrations.messages.created'));

        return redirect()->route('dashboard.registrations.show', $registration);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return view('dashboard.registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('dashboard.registrations.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\RegistrationRequest $request
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RegistrationRequest $request, Registration $registration)
    {
        $registration->update($request->all());

        flash()->success(trans('registrations.messages.updated'));

        return redirect()->route('dashboard.registrations.show', $registration);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Registration $registration
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        flash()->success(trans('registrations.messages.deleted'));

        return redirect()->route('dashboard.registrations.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Registration::class);

        $registrations = Registration::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.registrations.trashed', compact('registrations'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Registration $registration)
    {
        $this->authorize('viewTrash', $registration);

        return view('dashboard.registrations.show', compact('registration'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Registration $registration)
    {
        $this->authorize('restore', $registration);

        $registration->restore();

        flash()->success(trans('registrations.messages.restored'));

        return redirect()->route('dashboard.registrations.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Registration $registration
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Registration $registration)
    {
        $this->authorize('forceDelete', $registration);

        $registration->forceDelete();

        flash()->success(trans('registrations.messages.deleted'));

        return redirect()->route('dashboard.registrations.trashed');
    }
}
