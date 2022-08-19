<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BienResource extends JsonResource
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
            'id'=>$this->idbien,
            'code'=>strval($this->COM.$this->CITE.$this->NATURE.$this->NORDR),
            'com'=>$this->COM,
            'cite'=>$this->CITE,
            'nature'=>$this->NATURE,
            'nordr'=>$this->NORDR,
            'bat'=>$this->BAT,
            'cage'=>$this->CAGE,
            'etage'=>$this->ETAGE,
            'porte'=>$this->PORTE,
            'typologie'=>$this->TYPOLOGIE,
            'nom_cite'=>$this->LIBELLECOM." - ".$this->LIBELLECITE,
            'lp'=>$this->LP,
            'cl'=>$this->CL,
            'abatement'=>$this->abatement,
            'contratID'=>$this->idcontrat,
        ];
    }
}
