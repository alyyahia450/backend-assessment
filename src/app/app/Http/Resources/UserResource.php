<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'balance'=>$this->getBalance(),
            'currency'=>$this->getCurrency(),
            'email'=>$this->getEmail(),
            'status'=>$this->getStatus(),
            'status_as_string'=>$this->getStatusAsString(),
            'created_at'=>$this->getCreated_at(),
            'id'=>$this->getId(),
            
        ];
    }

  
}
