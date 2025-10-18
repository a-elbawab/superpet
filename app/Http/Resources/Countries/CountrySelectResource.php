<?php

namespace App\Http\Resources\Countries;

use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin  Country */
class CountrySelectResource extends JsonResource
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
            'text' => $this->name,
            'image' => $this->getFirstMediaUrl('flags'),
        ];
    }
}
