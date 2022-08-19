<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QloyeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           "ech"=>$this->ECH,
           "lp"=>$this->LP,
           "cl"=>$this->CL,
           "motantAbat"=>$this->MTABAT,
           "montant"=>$this->LP-$this->MTABAT+$this->CL, 
        ];
    }
}
