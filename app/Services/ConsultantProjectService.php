<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ConsultantProjectRequest;
use App\Http\Requests\UploadConsultantRequest;
use App\Http\Requests\UploadFileProjectRequest;
use App\Models\ConsultantProject;
use App\Traits\UploadTrait;

class ConsultantProjectService
{
    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $consultantProject
     * @return array
     */
    public function store(UploadConsultantRequest $request,ConsultantProject $consultantProject): array
    {
        $data = $request->validated();

        $old_administrative_minutes = $consultantProject->administrative_minutes;
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

        $old_contract = $consultantProject->contract;
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

        $old_report = $consultantProject->report;
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

        $old_minutes_of_disbursement = $consultantProject->minutes_of_disbursement;
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

        $old_minutes_of_hand_over = $consultantProject->minutes_of_hand_over;
        if (isset($data['minutes_of_hand_over'])) {
            if ($old_minutes_of_hand_over) {
                if ($request->hasFile('minutes_of_hand_over')) {
                    $this->remove($old_minutes_of_hand_over);
                    $old_minutes_of_hand_over = $this->upload(UploadDiskEnum::MINUTESOFHANDOVER->value, $request->file('minutes_of_hand_over'));
                }
            } else {
                $old_minutes_of_hand_over = $this->upload(UploadDiskEnum::MINUTESOFHANDOVER->value, $request->file('minutes_of_hand_over'));
            }
        }

        return [
            'report' => $old_report,
            'minutes_of_disbursement' => $old_minutes_of_disbursement,
            'minutes_of_hand_over' => $old_minutes_of_hand_over,
            'administrative_minutes' => $old_administrative_minutes,
            'contract' => $old_contract,
        ];
    }
}
