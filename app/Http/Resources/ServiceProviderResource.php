<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderResource extends JsonResource
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
            'user' => UserResource::make($this->user),
            'association' => AssociationResource::make($this->association),
            'address' => $this->address,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'province' => $this->province,
            'website' => $this->website,
            'form_of_business_entity' => $this->form_of_business_entity,
            'type_of_business_entity' => $this->type_of_business_entity,
        ];
    }
}
