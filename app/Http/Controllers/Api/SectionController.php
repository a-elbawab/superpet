<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\SectionResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SectionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the sections.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $sections = Section::filter()->simplePaginate();

        return SectionResource::collection($sections);
    }

    /**
     * Display the specified section.
     *
     * @param \App\Models\Section $section
     * @return \App\Http\Resources\SectionResource
     */
    public function show(Section $section)
    {
        return new SectionResource($section);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $sections = Section::filter()->simplePaginate();

        return SelectResource::collection($sections);
    }
}
