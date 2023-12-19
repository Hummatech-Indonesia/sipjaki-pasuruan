<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\RuleRequest;
use App\Models\News;
use App\Models\Rule;
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
            'rule_category_id'=>$data['rule_category_id'],
            'year' => $data['year'],
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
    public function update(RuleRequest $request, Rule $rule): array
    {
        $data = $request->validated();
        $old_file = $rules->file;
        if ($request->hasFile('file')) {
            $this->remove($old_file);
            $old_file = $this->upload(UploadDiskEnum::RULE->value, $request->file('file'));
        }
        return [
            'rule_category_id'=>$data['rule_category_id'],
            'year' => $data['year'],
            'title' => $data['title'],
            'code' => $data['code'],
            'file' => $old_file,
        ];
    }

    /**
     * downloadRule
     *
     * @param  mixed $file
     * @return void
     */
    public function downloadRule(mixed $file)
    {
        return response()->download(asset('storage/' . $file));
    }
}
