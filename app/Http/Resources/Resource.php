<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {

        return [
            'type'       => $this->getResourceType(),
            'id'         => $this->id,
            'attributes' => $this->getAttributes(),
        ];
    }

    public function getResourceType()
    {
        $name = Str::plural(class_basename($this->resource));

        return strtolower(basename($name));
    }

    public function getAttributes()
    {
        return $this->resource->getAttributes();
    }
}
