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
            'project' => [
                'name' => $this->executorProject->name,
                'year' => $this->executorProject->fiscalYear->name
            ],
            'location' => $this->location,
            'time' => $this->time,
            'description' => $this->description,
            'loss' => $this->loss,
            'problem' => $this->problem,
        ];
    }
}
