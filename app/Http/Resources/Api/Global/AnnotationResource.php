<?php

namespace App\Http\Resources\Api\Global;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnotationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user'=>[
                'id'=>$this->user_id,
                'name'=>$this->user->name
            ],
            'text'=>$this->text,
            'created_at'=>$this->created_at
        ];
    }
}
