<?php

namespace App\Http\Controllers\Api;

use App\Models\Station;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\StationResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the stations.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $stations = Station::filter()->simplePaginate();

        return StationResource::collection($stations);
    }

    /**
     * Display the specified station.
     *
     * @param \App\Models\Station $station
     * @return \App\Http\Resources\StationResource
     */
    public function show(Station $station)
    {
        return new StationResource($station);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $stations = Station::filter()->simplePaginate();

        return SelectResource::collection($stations);
    }
}
