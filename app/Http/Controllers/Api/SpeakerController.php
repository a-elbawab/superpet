<?php

namespace App\Http\Controllers\Api;

use App\Models\Speaker;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\SpeakerResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SpeakerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the speakers.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $speakers = Speaker::filter()->simplePaginate();

        return SpeakerResource::collection($speakers);
    }

    /**
     * Display the specified speaker.
     *
     * @param \App\Models\Speaker $speaker
     * @return \App\Http\Resources\SpeakerResource
     */
    public function show(Speaker $speaker)
    {
        return new SpeakerResource($speaker);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $speakers = Speaker::filter()->simplePaginate();

        return SelectResource::collection($speakers);
    }
}
