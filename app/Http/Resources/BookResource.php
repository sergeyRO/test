<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         /*return parent::toArray($request);*/
        return [
            'id' => $this->id,
            'name' => (string)$this->name,
            'comments' => (string)$this->comments,
            'pages' => $this->pages,
            'summa' => $this->summa,
            //'genre_id' => $this->genre_id,
            'gener' => $this->genre/*->genre*/,
           // ['gener' => $this->genre]
          //  'genre' => $this->genre,
        ];

    }
}
