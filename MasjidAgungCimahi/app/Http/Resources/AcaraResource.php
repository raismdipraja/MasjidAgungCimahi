<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AcaraResource extends JsonResource
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
            'nama_acara' => $this->nama_acara,
            'nama_ustad' => $this->nama_ustad,
            'gambar' => secure_asset('image/'.$this->gambar),
            'jenis_acara' => $this->jenis_acara,
        ];
    }
}
