<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DinasAccidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $accidentCount = 0;
        foreach ($this->projects as $project) {
            $accidentCount += $project->accidents->count();
        }
        return [
            'name' => $this->user->name,
            'accidentCount' => $accidentCount
        ];
    }
}
