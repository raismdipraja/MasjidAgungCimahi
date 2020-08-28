<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
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
            'judul' => $this->judul,
            'teks' => $this->teks,
            'gambar' => secure_asset('image/'.$this->gambar),
            'created_at' => date_format(date_create($this->crated_at),'d F Y'),
        ];
    }
}
