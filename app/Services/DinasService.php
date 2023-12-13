<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\DinasRequest;
use App\Traits\UploadTrait;
use Faker\Provider\Uuid;

class DinasService
{

    use UploadTrait;

    /**
     * updateDinas
     *
     * @param  mixed $request
     * @return array
     */
    public function updateDinas(DinasRequest $request): array
    {
        $data = $request->validated();
        $old_file = auth()->user()->dinas->sturucture_organization_file;
        if ($old_file) {
            if ($request->hasFile('sturucture_organization_file')) {
                $this->remove($old_file);
                $old_file = $this->upload(UploadDiskEnum::ORGANIZATIONFILE->value, $request->file('sturucture_organization_file'));
            }
        } else {
            $old_file = $this->upload(UploadDiskEnum::ORGANIZATIONFILE->value, $request->file('sturucture_organization_file'));
        }
        $data['sturucture_organization_file'] = $old_file;
        return $data;
    }

    /**
     * map
     *
     * @param  mixed $data
     * @param  mixed $status
     * @return array
     */
    public function map(array $fieldId, string $dinasId,): array
    {
        $array = array_map(function ($fieldId, $dinasId) {
            return [
                'id' => Uuid::uuid(),
                'dinas_id' => $dinasId,
                'field_id' => $fieldId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $fieldId, array_fill(0, count($fieldId), $dinasId));
        return $array;
    }

    /**
     * Handle store data event to models.
     *
     * @param StudentClassroomRequest $request
     *
     */
    public function store(DinasRequest $request): array
    {
        $data = $request->validated();
        return $this->map($data['field_id'], auth()->user()->dinas->id);
    }
}
