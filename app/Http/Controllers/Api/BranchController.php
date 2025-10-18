<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\BranchResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BranchController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the branches.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $branches = Branch::filter()->simplePaginate();

        return BranchResource::collection($branches);
    }

    /**
     * Display the specified branch.
     *
     * @param \App\Models\Branch $branch
     * @return \App\Http\Resources\BranchResource
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $branches = Branch::filter()->simplePaginate();

        return SelectResource::collection($branches);
    }
}
