<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderProjectResource extends JsonResource
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
            'date_start' => $this->date_start,
            'date_finish' => $this->date_finish,
            'file' => asset('storage/' . $this->file),
            'description' => $this->description,
            'week' => $this->week,
            'progres' => $this->progres,
        ];
    }
}
