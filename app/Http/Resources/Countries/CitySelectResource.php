<?php

namespace App\Http\Resources\Countries;

use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin  City */
class CitySelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' =>  $this->name,
            'image' => optional(optional($this->country)->getFirstMediaUrl('flags')),
        ];
    }
}
