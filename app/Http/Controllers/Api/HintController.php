<?php

namespace App\Http\Controllers\Api;

use App\Models\Hint;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\HintResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HintController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the hints.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $hints = Hint::filter()->simplePaginate();

        return HintResource::collection($hints);
    }

    /**
     * Display the specified hint.
     *
     * @param \App\Models\Hint $hint
     * @return \App\Http\Resources\HintResource
     */
    public function show(Hint $hint)
    {
        return new HintResource($hint);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $hints = Hint::filter()->simplePaginate();

        return SelectResource::collection($hints);
    }
}
