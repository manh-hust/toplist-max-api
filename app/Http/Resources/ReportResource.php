<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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

            'id' => $this->id,
            'nickname' => $this->nickname,
            'email' => $this->email_address,
            'content' => $this->content,
            'place' => ['name' => $this->massagePlace->name, 'id' => $this->massagePlace->id],
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
