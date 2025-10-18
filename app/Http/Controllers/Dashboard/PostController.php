<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\PostRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::filter()->latest()->paginate();

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        $post->addAllMediaFromTokens($request->image);

        flash()->success(trans('posts.messages.created'));

        return redirect()->route('dashboard.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\PostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        $post->addAllMediaFromTokens($request->image);

        flash()->success(trans('posts.messages.updated'));

        return redirect()->route('dashboard.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash()->success(trans('posts.messages.deleted'));

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Post::class);

        $posts = Post::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.posts.trashed', compact('posts'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Post $post)
    {
        $this->authorize('viewTrash', $post);

        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Post $post)
    {
        $this->authorize('restore', $post);

        $post->restore();

        flash()->success(trans('posts.messages.restored'));

        return redirect()->route('dashboard.posts.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Post $post)
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        flash()->success(trans('posts.messages.deleted'));

        return redirect()->route('dashboard.posts.trashed');
    }
}
