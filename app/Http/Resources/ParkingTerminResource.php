<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingTerminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='parking_termin';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'automobil'=>new AutomobilResource($this->resource->automobil),
            'parking'=>new ParkingResource($this->resource->parking),
            'ulazak'=>$this->resource->ulazak,
            'izlazak'=>$this->resource->izlazak
        ];
    }
}
