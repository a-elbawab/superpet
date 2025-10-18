<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\SliderResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SliderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the sliders.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $sliders = Slider::filter()->simplePaginate();

        return SliderResource::collection($sliders);
    }

    /**
     * Display the specified slider.
     *
     * @param \App\Models\Slider $slider
     * @return \App\Http\Resources\SliderResource
     */
    public function show(Slider $slider)
    {
        return new SliderResource($slider);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $sliders = Slider::filter()->simplePaginate();

        return SelectResource::collection($sliders);
    }
}
