<?php

namespace App\Services;

use App\Traits\UploadTrait;
use App\Enums\UploadDiskEnum;
use App\Models\ExecutorProject;
use App\Http\Requests\UploadExecutorRequest;

class ExecutorProjectService
{
    use UploadTrait;

    public function store(UploadExecutorRequest $request,ExecutorProject $executorProject): array
    {
        $data = $request->validated();

        if ($request->hasFile('contract')) {
            if ($executorProject->contract) {
                $this->remove($executorProject->contract);
            }
            $data['contract'] = $this->upload(UploadDiskEnum::CONTRACT->value, $request->file('contract'));
        }
        else {
            $data['contract'] = $executorProject->contract;
        }


        if ($request->hasFile('administrative_minutes')) {
            if ($executorProject->administrative_minutes) {
                $this->remove($executorProject->administrative_minutes);
            }
            $data['administrative_minutes'] = $this->upload(UploadDiskEnum::ADMINISTRATIVEMINUTE->value, $request->file('administrative_minutes'));
        }
        else {
            $data['administrative_minutes'] = $executorProject->administrative_minutes;
        }

        if ($request->hasFile('uitzet_minutes')) {
            if ($executorProject->uitzet_minutes) {
                $this->remove($executorProject->uitzet_minutes);
            }
            $data['uitzet_minutes'] = $this->upload(UploadDiskEnum::UITZETMINUTES->value, $request->file('uitzet_minutes'));
        }
        else {
            $data['uitzet_minutes'] = $executorProject->uitzet_minutes;
        }


        if ($request->hasFile('mutual_check_0')) {
            if ($executorProject->mutual_check_0) {
                $this->remove($executorProject->mutual_check_0);
            }
            $data['mutual_check_0'] = $this->upload(UploadDiskEnum::MUTUALCHECK0->value, $request->file('mutual_check_0'));
        }
        else {
            $data['mutual_check_0'] = $executorProject->mutual_check_0;
        }

        if ($request->hasFile('mutual_check_100')) {
            if ($executorProject->mutual_check_100) {
                $this->remove($executorProject->mutual_check_100);
            }
            $data['mutual_check_100'] = $this->upload(UploadDiskEnum::MUTUALCHECK100->value, $request->file('mutual_check_100'));
        }
        else {
            $data['mutual_check_100'] = $executorProject->mutual_check_100;
        }


        if ($request->hasFile('p1_meeting_minutes')) {
            if ($executorProject->p1_meeting_minutes) {
                $this->remove($executorProject->p1_meeting_minutes);
            }
            $data['p1_meeting_minutes'] = $this->upload(UploadDiskEnum::P1MEETINGMINUTES->value, $request->file('p1_meeting_minutes'));
        }
        else {
            $data['p1_meeting_minutes'] = $executorProject->p1_meeting_minutes;
        }

        if ($request->hasFile('p2_meeting_minutes')) {
            if ($executorProject->p2_meeting_minutes) {
                $this->remove($executorProject->p2_meeting_minutes);
            }
            $data['p2_meeting_minutes'] = $this->upload(UploadDiskEnum::P2MEETINGMINUTES->value, $request->file('p2_meeting_minutes'));
        }
        else {
            $data['p2_meeting_minutes'] = $executorProject->p2_meeting_minutes;
        }


        if ($request->hasFile('minutes_of_disbursement')) {
            if ($executorProject->minutes_of_disbursement) {
                $this->remove($executorProject->minutes_of_disbursement);
            }
            $data['minutes_of_disbursement'] = $this->upload(UploadDiskEnum::MINUTESOFDISBURSEMENT->value, $request->file('minutes_of_disbursement'));
        }
        else {
            $data['minutes_of_disbursement'] = $executorProject->minutes_of_disbursement;
        }

        if ($request->hasFile('report')) {
            if ($executorProject->report) {
                $this->remove($executorProject->report);
            }
            $data['report'] = $this->upload(UploadDiskEnum::REPORT->value, $request->file('report'));
        }
        else {
            $data['report'] = $executorProject->report;
        }


        if ($request->hasFile('order_mail')) {
            if ($executorProject->order_mail) {
                $this->remove($executorProject->order_mail);
            }
            $data['order_mail'] = $this->upload(UploadDiskEnum::ORDERMAIL->value, $request->file('order_mail'));
        }
        else {
            $data['order_mail'] = $executorProject->order_mail;
        }

        if ($request->hasFile('invoice')) {
            if ($executorProject->invoice) {
                $this->remove($executorProject->invoice);
            }
            $data['invoice'] = $this->upload(UploadDiskEnum::INVOICE->value, $request->file('invoice'));
        }
        else {
            $data['invoice'] = $executorProject->invoice;
        }

        if ($request->hasFile('shop_drawing')) {
            if ($executorProject->shop_drawing) {
                $this->remove($executorProject->shop_drawing);
            }
            $data['shop_drawing'] = $this->upload(UploadDiskEnum::SHOPDRAWING->value, $request->file('shop_drawing'));
        }
        else {
            $data['shop_drawing'] = $executorProject->shop_drawing;
        }

        if ($request->hasFile('asbuild_drawing')) {
            if ($executorProject->asbuild_drawing) {
                $this->remove($executorProject->asbuild_drawing);
            }
            $data['asbuild_drawing'] = $this->upload(UploadDiskEnum::ASBUILDDRAWING->value, $request->file('asbuild_drawing'));
        }
        else {
            $data['asbuild_drawing'] = $executorProject->asbuild_drawing;
        }

        if ($request->hasFile('pcm_minutes')) {
            if ($executorProject->pcm_minutes) {
                $this->remove($executorProject->pcm_minutes);
            }
            $data['pcm_minutes'] = $this->upload(UploadDiskEnum::PCMMINUTES->value, $request->file('pcm_minutes'));
        }
        else {
            $data['pcm_minutes'] = $executorProject->asbuild_drawing;
        }

        return $data;
    }
}
