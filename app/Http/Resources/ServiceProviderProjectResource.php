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
            'project' => ProjectResource::make($this->project),
            'service_provider' => ServiceProviderResource::make($this->serviceProvider),
            'date_start' => $this->date_start,
            'date_finish' => $this->date_finish,
            'file' => asset('storage/' . $this->file),
            'description' => $this->description,
            'progres' => $this->progres,
        ];
    }
}
