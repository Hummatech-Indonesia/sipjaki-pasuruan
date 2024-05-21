<?php

namespace App\Enums;

enum UploadDiskEnum: string
{
    case THUMBNAIL = 'thumbnail';
    case RULE = 'rule';
    case STRUCTUREORGANITATION = 'structure_organitation';
    case JOBANDFUNCTION = 'job_and_function';
    case STRATEGICPLAN = 'strategic_plan';
    case FAQ = 'faq';
    case TRAININGMEMBER = 'trainingmember';
    case PROFILE = 'profile';
    case SERVICEPROVIDERPROJECT = 'service_provider_project';
    case ORGANIZATIONFILE = 'organization_file';
    case VIDEO = 'video';
    case CONTRACT = 'contract';
    case ADMINISTRATIVEMINUTE = 'administrative_minutes';
    case REPORT = 'report';
    case MINUTESOFDISBURSEMENT = 'minutes_of_disbursement';
    case MINUTESOFHANDOVER = 'minutes_of_hand_over';
    case UITZETMINUTES = 'uitzet_minutes';
    case MUTUALCHECK0 = 'mutual_check_0';
    case MUTUALCHECK100 = 'mutual_check_100';
    case QUALIFICATION = 'qualification';
    case CLASSIFICATION = 'classification';
    case SERVICEPROVIDER = 'serviceprovider';
    case WORKER_CERTIFICATE = 'worker_certificate';
    case P1MEETINGMINUTES = 'p1_meeting_minutes';
    case P2MEETINGMINUTES = 'p2_meeting_minutes';
    case CONTENT = 'content';
    case ORDERMAIL = 'order_mail';
    case INVOICE = 'invoice';
    case SHOPDRAWING = 'shop_drawing';
    case ASBUILDDRAWING = 'ashbuild_drawing';
    case PCMMINUTES = 'pcm_minutes';
}
