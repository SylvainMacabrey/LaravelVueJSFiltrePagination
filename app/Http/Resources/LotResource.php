<?php

namespace App\Http\Resources;

use App\Models\Program;
use Illuminate\Http\Resources\Json\JsonResource;

class LotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //$program = Program::find($this->program_id);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'area' => $this->area,
            'price' => $this->price,
            'program' => $this->program->name,
            'picture' => $this->program->picture,
            'address' => $this->program->address
        ];
    }
}
