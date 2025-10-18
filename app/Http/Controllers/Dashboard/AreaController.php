<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Countries\AreaRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AreaController extends Controller
{
    use AuthorizesRequests;

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Countries\AreaRequest $request
     * @param \App\Models\City $city
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AreaRequest $request, City $city)
    {
        $this->authorize('create', Area::class);

        $city->areas()->create($request->all());

        flash(trans('areas.messages.created'));

        return redirect()->back();
    }

    /**
     * Display the area edit form.
     *
     * @param \App\Models\City $city
     * @param \App\Models\Area $area
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, Area $area)
    {
        $this->authorize('update', [$area, $city]);

        return view('dashboard.areas.edit', compact('city', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Countries\AreaRequest $request
     * @param \App\Models\City $city
     * @param \App\Models\Area $area
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AreaRequest $request, City $city, Area $area)
    {
        $this->authorize('update', [$area, $city]);

        $area->update($request->all());

        flash(trans('areas.messages.updated'));

        return redirect()->route('dashboard.countries.cities.show', [$city->country, $city]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\City $city
     * @param \App\Models\Area $area
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(City $city, Area $area)
    {
        $this->authorize('delete', [$area, $city]);

        $area->delete();

        flash(trans('areas.messages.deleted'));

        return redirect()->route('dashboard.countries.cities.show', [$city->country, $city]);
    }

    public function sort(Request $request)
    {
        foreach ($request->order as $item) {
            Area::where('id', $item['id'])->update(['position' => $item['position']]);
        }

        return response()->json(['status' => 'success']);
    }

}
