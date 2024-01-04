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

        if ($request->hasFile('uitzet_minutes')) {
            if ($executor->uitzet_minutes) {
                $this->remove($executor->uitzet_minutes);
            }
            $data['uitzet_minutes'] = $this->upload(UploadDiskEnum::UITZETMINUTES->value, $request->file('uitzet_minutes'));
        }
        else {
            $data['uitzet_minutes'] = $executor->uitzet_minutes;
        }


        if ($request->hasFile('mutual_check_0')) {
            if ($executor->mutual_check_0) {
                $this->remove($executor->mutual_check_0);
            }
            $data['mutual_check_0'] = $this->upload(UploadDiskEnum::MUTUALCHECK0->value, $request->file('mutual_check_0'));
        }
        else {
            $data['mutual_check_0'] = $executor->mutual_check_0;
        }

        if ($request->hasFile('mutual_check_100')) {
            if ($executor->mutual_check_100) {
                $this->remove($executor->mutual_check_100);
            }
            $data['mutual_check_100'] = $this->upload(UploadDiskEnum::MUTUALCHECK100->value, $request->file('mutual_check_100'));
        }
        else {
            $data['mutual_check_100'] = $executor->mutual_check_100;
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

        if ($request->hasFile('p2_meeting_minutes')) {
            if ($executor->p2_meeting_minutes) {
                $this->remove($executor->p2_meeting_minutes);
            }
            $data['p2_meeting_minutes'] = $this->upload(UploadDiskEnum::P2MEETINGMINUTES->value, $request->file('p2_meeting_minutes'));
        }
        else {
            $data['p2_meeting_minutes'] = $executor->p2_meeting_minutes;
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
