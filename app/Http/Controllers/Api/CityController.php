<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Countries\CitySelectResource;
use App\Models\City;
use App\Models\Country;
use Illuminate\Routing\Controller;
use App\Http\Resources\Countries\CityResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CityController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * CityController constructor.
     */
    public function __construct()
    {
        // $this->authorizeResource(City::class, 'city');
    }

    /**
     * Display a listing of the cities.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $cities = [];
        if (request('country_id')) {
            $cities = City::with('country')->filter()->get();
        }
        return CitySelectResource::collection($cities);
    }


    /**
     * Display a listing of the cities.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public
    function options()
    {
        $country = Country::find(request()->input('country_id'));
        $cities = $country->cities->pluck('name', 'id');

        return $cities;
    }

    /**
     * Display the specified city.
     *
     * @param \App\Models\City $city
     * @return \App\Http\Resources\Countries\CityResource
     */
    public
    function show(City $city)
    {
        $city->load('areas');

        return new CityResource($city);
    }
}
