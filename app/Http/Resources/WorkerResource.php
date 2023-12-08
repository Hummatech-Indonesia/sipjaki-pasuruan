<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
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
            'service_provider' => $this->service_provider_id,
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'education' => $this->education,
            'registration_number' => $this->registration_number,
            'cerificate' => $this->cerificate,
        ];
    }
}
