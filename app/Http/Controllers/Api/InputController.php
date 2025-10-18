<?php

namespace App\Http\Controllers\Api;

use App\Models\Input;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\InputResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InputController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the inputs.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $inputs = Input::filter()->simplePaginate();

        return InputResource::collection($inputs);
    }

    /**
     * Display the specified input.
     *
     * @param \App\Models\Input $input
     * @return \App\Http\Resources\InputResource
     */
    public function show(Input $input)
    {
        return new InputResource($input);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $inputs = Input::filter()->simplePaginate();

        return SelectResource::collection($inputs);
    }
}
