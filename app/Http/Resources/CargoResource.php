<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CargoResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'date'=>$this->point['date'],
            'route'=>$this->point['name'],
            'weight'=>$this->weight
        ];
    }
}
