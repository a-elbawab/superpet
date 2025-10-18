<?php

namespace App\Http\Resources\Desktop;

use Illuminate\Http\Resources\Json\JsonResource;

class GuestStationCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'guest_id' => $this->guest_id,
            'station_id' => $this->station_id,
        ];
    }
}
