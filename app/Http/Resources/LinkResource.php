<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            /*'book_id' => $this->book_id,
            'shop_id'=> $this->shop_id,*/
            'book' => $this->book/*->name*/,
            'shop' => $this->shop/*->name*/,

            'created_at' => (string)$this->created_at,
        ];
    }
}
