<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ExecutorProjectRequest;
use App\Models\Project;
use App\Traits\UploadTrait;

class ExecutorProjectService
{
    use UploadTrait;

    public function store(ExecutorProjectRequest $request, Project $project): array
    {
        $executor = $project->executorProject;
        $data = $request->validated();
        $data['project_id'] = $project->id;
        if ($request->hasFile('contract')) {
            if ($executor->contract) {
                $this->remove($executor->contract);
            }
            $data['contract'] = $this->upload(UploadDiskEnum::CONTRACT->value, $request->file('contract'));
        }
        else {
            $data['contract'] = $executor->contract;
        }
        if ($request->hasFile('administrative_minutes')) {
            if ($executor->administrative_minutes) {
                $this->remove($executor->administrative_minutes);
            }
            $data['administrative_minutes'] = $this->upload(UploadDiskEnum::ADMINISTRATIVEMINUTE->value, $request->file('administrative_minutes'));
        }
        else {
            $data['administrative_minutes'] = $executor->administrative_minutes;
        }
        if ($request->hasFile('p1_meeting_minutes')) {
            if ($executor->p1_meeting_minutes) {
                $this->remove($executor->p1_meeting_minutes);
            }
            $data['p1_meeting_minutes'] = $this->upload(UploadDiskEnum::P1MEETINGMINUTES->value, $request->file('p1_meeting_minutes'));
        }
        else {
            $data['p1_meeting_minutes'] = $executor->p1_meeting_minutes;
        }
        if ($request->hasFile('minutes_of_disbursement')) {
            if ($executor->minutes_of_disbursement) {
                $this->remove($executor->minutes_of_disbursement);
            }
            $data['minutes_of_disbursement'] = $this->upload(UploadDiskEnum::MINUTESOFDISBURSEMENT->value, $request->file('minutes_of_disbursement'));
        }
        else {
            $data['minutes_of_disbursement'] = $executor->minutes_of_disbursement;
        }

        return $data;
    }
}
