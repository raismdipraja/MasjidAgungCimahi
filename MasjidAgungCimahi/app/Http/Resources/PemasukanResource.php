<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemasukanResource extends JsonResource
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
            'jumlah' => $this->jumlah,
            'nama_pemberi' => $this->nama_pemberi,
            'tanggal' => date_format(date_create($this->tanggal),'d F Y'),
        ];
    }
}
