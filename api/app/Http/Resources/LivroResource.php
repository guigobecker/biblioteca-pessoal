<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'classificacao' => $this->classificacao,
            'resenha' => $this->resenha,
            'criado_em' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
        ];
    }
}
