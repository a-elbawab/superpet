<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'name' => $this->name, //should be domain like "meetsupevents.com" etc
            'title' => $this->title,
        ];
    }
}
