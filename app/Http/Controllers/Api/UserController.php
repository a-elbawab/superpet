<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $users = User::filter()->paginate();

        return SelectResource::collection($users);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function customers()
    {
        $customers = User::where('type', User::CUSTOMER_TYPE)->filter()->paginate();

        return SelectResource::collection($customers);
    }

    /**
     * Get types
     *
     * @return void
     */
    public function types()
    {
        $types = __('users.types');

        return response()->json([
            'data' => $types
        ]);
    }
}
