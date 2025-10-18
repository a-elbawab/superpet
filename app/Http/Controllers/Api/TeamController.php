<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\TeamResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeamController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the teams.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $teams = Team::filter()->simplePaginate();

        return TeamResource::collection($teams);
    }

    /**
     * Display the specified team.
     *
     * @param \App\Models\Team $team
     * @return \App\Http\Resources\TeamResource
     */
    public function show(Team $team)
    {
        return new TeamResource($team);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $teams = Team::filter()->simplePaginate();

        return SelectResource::collection($teams);
    }
}
