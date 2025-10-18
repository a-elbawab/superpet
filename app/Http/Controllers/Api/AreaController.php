<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\City;
use Illuminate\Routing\Controller;
use App\Http\Resources\Countries\AreaSelectResource;
use App\Http\Resources\Countries\CitySelectResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AreaController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * AreaController constructor.
     */
    public function __construct()
    {
        // $this->authorizeResource(Area::class, 'area');
    }

    /**
     * Display a listing of the areas.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $areas = [];
        if (request('city_id')) {
            $areas = Area::with('city')->filter()->get();
        }

        return AreaSelectResource::collection($areas);
    }

    /**
     * Display a listing of the areas.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function options()
    {
        $city = City::find(request()->input('city_id'));
        $areas = $city->areas->pluck('name', 'id');

        return $areas;
    }
}
