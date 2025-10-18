<?php

namespace App\Http\Resources\Desktop;

use App\Models\Guest;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Guest
 */
class GuestCollection extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'mobile' => $this->phone,
            'email' => $this->email,
            'affiliation' => $this->affiliation,
            'city' => $this->guestCity ? optional($this->guestCity)->name : "",
            'registration_type' => $this->registration_type,
            'event' => $this->event ? optional($this->event)->title : "",
            'code' => $this->code ?: $this->id,
            'note' => $this->note,
        ];
    }
}
