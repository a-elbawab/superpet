<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\TagResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TagController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $tags = Tag::filter()->simplePaginate();

        return TagResource::collection($tags);
    }

    /**
     * Display the specified tag.
     *
     * @param \App\Models\Tag $tag
     * @return \App\Http\Resources\TagResource
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $tags = Tag::filter()->simplePaginate();

        return SelectResource::collection($tags);
    }
}
