<?php

namespace App\Http\Resources\Desktop;

use Illuminate\Http\Resources\Json\JsonResource;

class DayGuestCollection extends JsonResource
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
            'day_id' => $this->day_id,
            'attend' => $this->attend,
        ];
    }
}
