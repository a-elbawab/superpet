<?php

namespace App\Http\Resources\Countries;

use App\Models\Area;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Area */
class AreaSelectResource extends JsonResource
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
         ];
    }
}
