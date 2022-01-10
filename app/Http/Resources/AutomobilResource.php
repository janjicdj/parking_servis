<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutomobilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='automobil';

    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'reg_br'=>$this->resource->reg_br,
            'marka'=>$this->resource->marka,
            'model'=>$this->resource->model,
            'godiste'=>$this->resource->godiste,
            'gorivo'=>$this->resource->gorivo,
            'karoserija'=>$this->resource->karoserija,
            'boja'=>$this->resource->boja
        ];
    }
}
