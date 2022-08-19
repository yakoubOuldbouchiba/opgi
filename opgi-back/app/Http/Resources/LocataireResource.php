<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocataireResource extends JsonResource
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
            'nom'=>$this->NOM,
            'prenom'=>$this->PRENOM,
            'dateNais'=>$this->DATNAIS,
            'lieuNais'=>$this->LIEU
        ];
    }
}
