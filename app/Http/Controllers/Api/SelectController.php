<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\SelectFilter;
use App\Http\Resources\Countries\AreaSelectResource;
use App\Http\Resources\Countries\CitySelectResource;
use App\Http\Resources\Countries\CountrySelectResource;
use App\Http\Resources\PageSelectResource;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Page;
use Illuminate\Routing\Controller;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function countries(SelectFilter $filter)
    {
        $countries = Country::active()->filter($filter)->paginate();

        return CountrySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cities(SelectFilter $filter)
    {
        $countries = City::with('country')->filter($filter)->paginate();

        return CitySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function areas(SelectFilter $filter)
    {
        $countries = Area::with('city')->filter($filter)->paginate();

        return AreaSelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function pages(SelectFilter $filter)
    {
        $pages = Page::filter($filter)->paginate();

        return PageSelectResource::collection($pages);
    }
}
