<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Team;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\TeamRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeamController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Team::class, 'team');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::filter()->latest()->paginate();

        return view('dashboard.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamRequest $request)
    {
        $team = Team::create($request->all());
        $team->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('teams.messages.created'));

        return redirect()->route('dashboard.teams.show', $team);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('dashboard.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TeamRequest $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team->update($request->all());
        $team->addAllMediaFromTokens($request->input('image'));

        flash()->success(trans('teams.messages.updated'));

        return redirect()->route('dashboard.teams.show', $team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Team $team)
    {
        $team->delete();

        flash()->success(trans('teams.messages.deleted'));

        return redirect()->route('dashboard.teams.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Team::class);

        $teams = Team::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.teams.trashed', compact('teams'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Team $team)
    {
        $this->authorize('viewTrash', $team);

        return view('dashboard.teams.show', compact('team'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Team $team)
    {
        $this->authorize('restore', $team);

        $team->restore();

        flash()->success(trans('teams.messages.restored'));

        return redirect()->route('dashboard.teams.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Team $team)
    {
        $this->authorize('forceDelete', $team);

        $team->forceDelete();

        flash()->success(trans('teams.messages.deleted'));

        return redirect()->route('dashboard.teams.trashed');
    }
}
