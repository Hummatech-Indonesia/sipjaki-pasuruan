<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\RuleRequest;
use App\Models\News;
use App\Models\Rules;
use App\Traits\UploadTrait;

class RuleService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(RuleRequest $request): array
    {
        $data = $request->validated();
        return [
            'fiscal_year_id' => $data['fiscal_year_id'],
            'title' => $data['title'],
            'code' => $data['code'],
            'file' => $this->upload(UploadDiskEnum::RULE->value, $request->file('file')),
        ];
    }


    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $rules
     * @return array
     */
    public function update(RuleRequest $request, Rules $rules): array
    {
        $data = $request->validated();
        $old_file = $rules->file;
        if ($request->hasFile('file')) {
            $this->remove($old_file);
            $old_file = $this->upload(UploadDiskEnum::RULE->value, $request->file('file'));
        }
        return [
            'fiscal_year_id' => $data['fiscal_year_id'],
            'title' => $data['title'],
            'code' => $data['code'],
            'file' => $old_file,
        ];
    }
}
