<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\PostResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = Post::filter()->simplePaginate();

        return PostResource::collection($posts);
    }

    /**
     * Display the specified post.
     *
     * @param \App\Models\Post $post
     * @return \App\Http\Resources\PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $posts = Post::filter()->simplePaginate();

        return SelectResource::collection($posts);
    }
}
