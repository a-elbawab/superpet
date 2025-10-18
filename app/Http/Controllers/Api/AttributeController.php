<?php

namespace App\Http\Controllers\Api;

use App\Models\Attribute;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\AttributeResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttributeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the attributes.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $attributes = Attribute::filter()->simplePaginate();

        return AttributeResource::collection($attributes);
    }

    /**
     * Display the specified attribute.
     *
     * @param \App\Models\Attribute $attribute
     * @return \App\Http\Resources\AttributeResource
     */
    public function show(Attribute $attribute)
    {
        return new AttributeResource($attribute);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $attributes = Attribute::filter()->simplePaginate();

        return SelectResource::collection($attributes);
    }
}
