<?php

namespace App\Http\Resources\Api\Global;

use App\Http\Resources\User\ProfileShortResource;
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
            'user'=>new ProfileShortResource($this->user),
            'text'=>$this->text,
            'created_at'=>$this->created_at
        ];
    }
}
