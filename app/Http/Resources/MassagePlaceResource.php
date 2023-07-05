<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MassagePlaceResource extends JsonResource
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
            'name' => $this->name,
            'area' => $this->area,
            'address' => $this->address,
            'rate' => $this->rate,
            'service' => $this->service,
            'reviewContent' => $this->review_content,
            'phoneNumber' => $this->phone_number,
            'advantage' => $this->advantage,
            'status' => $this->status,
            'maxPrice' => $this->max_price,
            'minPrice' => $this->min_price,
            'photoUrl' => $this->photo_url,
            'createdAt' => $this->created_at->format('Y-m-d'),
            'serviceLanguages' => ServiceLanguageResource::collection($this->serviceLanguages),
        ];
    }
}
