<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UploadFileProjectRequest;
use App\Models\Project;
use App\Traits\UploadTrait;

class ProjectService
{
    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(UploadFileProjectRequest $request, Project $project): array
    {
        $data = $request->validated();

        $old_administrative_minutes = $project->administrative_minutes;
        if (isset($data['administrative_minutes'])) {
            if ($old_administrative_minutes) {
                if ($request->hasFile('administrative_minutes')) {
                    $this->remove($old_administrative_minutes);
                    $old_administrative_minutes = $this->upload(UploadDiskEnum::ADMINISTRATIVEMINUTE->value, $request->file('administrative_minutes'));
                }
            } else {
                $old_administrative_minutes = $this->upload(UploadDiskEnum::ADMINISTRATIVEMINUTE->value, $request->file('administrative_minutes'));
            }
        }

        $old_contract = $project->contract;
        if (isset($data['contract'])) {
            if ($old_contract) {
                if ($request->hasFile('contract')) {
                    $this->remove($old_contract);
                    $old_contract = $this->upload(UploadDiskEnum::CONTRACT->value, $request->file('contract'));
                }
            } else {
                $old_contract = $this->upload(UploadDiskEnum::CONTRACT->value, $request->file('contract'));
            }
        }

        $old_report = $project->report;
        if (isset($data['report'])) {
            if ($old_report) {
                if ($request->hasFile('report')) {
                    $this->remove($old_report);
                    $old_report = $this->upload(UploadDiskEnum::REPORT->value, $request->file('report'));
                }
            } else {
                $old_report = $this->upload(UploadDiskEnum::REPORT->value, $request->file('report'));
            }
        }

        $old_minutes_of_disbursement = $project->minutes_of_disbursement;
        if (isset($data['minutes_of_disbursement'])) {
            if ($old_minutes_of_disbursement) {
                if ($request->hasFile('minutes_of_disbursement')) {
                    $this->remove($old_minutes_of_disbursement);
                    $old_minutes_of_disbursement = $this->upload(UploadDiskEnum::MINUTESOFDISBURSEMENT->value, $request->file('minutes_of_disbursement'));
                }
            } else {
                $old_minutes_of_disbursement = $this->upload(UploadDiskEnum::MINUTESOFDISBURSEMENT->value, $request->file('minutes_of_disbursement'));
            }
        }
        return [
            'report' => $old_report,
            'minutes_of_disbursement' => $old_minutes_of_disbursement,
            'administrative_minutes' => $old_administrative_minutes,
            'contract' => $old_contract
        ];
    }
}
