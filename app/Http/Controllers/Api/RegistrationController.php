<?php

namespace App\Http\Controllers\Api;

use App\Models\Registration;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\RegistrationResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegistrationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the registrations.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $registrations = Registration::filter()->simplePaginate();

        return RegistrationResource::collection($registrations);
    }

    /**
     * Display the specified registration.
     *
     * @param \App\Models\Registration $registration
     * @return \App\Http\Resources\RegistrationResource
     */
    public function show(Registration $registration)
    {
        return new RegistrationResource($registration);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $registrations = Registration::filter()->simplePaginate();

        return SelectResource::collection($registrations);
    }
}
