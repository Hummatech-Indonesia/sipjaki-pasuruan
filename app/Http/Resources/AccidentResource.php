<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccidentResource extends JsonResource
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
            'project' => ProjectResource::make($this->project),
            'location' => $this->location,
            'time' => $this->time,
            'description' => $this->description,
            'loss' => $this->loss,
            'problem' => $this->problem,
        ];
    }
}
