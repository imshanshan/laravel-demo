<?php

namespace App\Http\Resources\view\web\partials;

use Illuminate\Http\Resources\Json\JsonResource;

class message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
