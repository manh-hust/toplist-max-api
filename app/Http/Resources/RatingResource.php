<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            'nickname' => $this->nickname,
            'emailAddress' => $this->email_address,
            'content' => $this->content,
            'point' => $this->point,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
