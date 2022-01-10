<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KorisnikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='zaposleni';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'ime'=>$this->resource->ime,
            'prezime'=>$this->resource->prezime,
            'datumrodjenja'=>$this->resource->datumrodjenja,
            'pol'=>$this->resource->pol,
            'username'=>$this->resource->username,
            'parking_id'=>new ParkingResource($this->resource->parking)
        ];
    }
}
