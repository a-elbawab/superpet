<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\GalleryResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GalleryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the galleries.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $galleries = Gallery::filter()->simplePaginate();

        return GalleryResource::collection($galleries);
    }

    /**
     * Display the specified gallery.
     *
     * @param \App\Models\Gallery $gallery
     * @return \App\Http\Resources\GalleryResource
     */
    public function show(Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $galleries = Gallery::filter()->simplePaginate();

        return SelectResource::collection($galleries);
    }
}
