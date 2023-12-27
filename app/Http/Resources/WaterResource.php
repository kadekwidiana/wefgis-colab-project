<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WaterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->water_id,
            'regency_id' => $this->regency_id,
            'lu_id' => $this->lu_id,
            'lc_id' => $this->lc_id,
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'address' => $this->address,
            'wide' => $this->wide,
            'aoi' => $this->aoi,
            'status_area' => $this->status_area,
            'ownership' => $this->ownership,
            'photo' => $this->photo,
            'permanence' => $this->permanence,
            'description' => $this->description,
            'related_photo' => $this->related_photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
