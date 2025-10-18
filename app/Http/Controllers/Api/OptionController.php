<?php

namespace App\Http\Controllers\Api;

use App\Models\Option;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\OptionResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OptionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the options.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $options = Option::filter()->simplePaginate();

        return OptionResource::collection($options);
    }

    /**
     * Display the specified option.
     *
     * @param \App\Models\Option $option
     * @return \App\Http\Resources\OptionResource
     */
    public function show(Option $option)
    {
        return new OptionResource($option);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $options = Option::filter()->simplePaginate();

        return SelectResource::collection($options);
    }
}
