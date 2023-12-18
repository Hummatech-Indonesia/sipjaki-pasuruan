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
}
