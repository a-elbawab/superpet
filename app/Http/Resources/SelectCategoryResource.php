<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\HasMedia;


class SelectCategoryResource extends JsonResource
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
            'text' => $this->tree . ' (' . $this->depth . ')',
            'image' => $this->getImage(),
        ];
    }

    /**
     * @return string
     */
    public function getImage()
    {
        if ($this->resource instanceof HasMedia) {
            return $this->getFirstMediaUrl();
        }
    }
}
