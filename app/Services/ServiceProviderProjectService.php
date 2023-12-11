<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderProjectRequest;
use App\Models\Project;
use App\Models\ServiceProviderProject;
use App\Traits\UploadTrait;

class ServiceProviderProjectService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $serviceProviderProjects
     * @param  mixed $project
     * @return mixed
     */
    public function store(ServiceProviderProjectRequest $request, $serviceProviderProjects, Project $project): mixed
    {
        $data = $request->validated();
        $progres = 0;
        $data['project_id'] = $project->id;
        $data['file'] = $this->upload(UploadDiskEnum::SERVICEPROVIDERPROJECT->value, $request->file('file'));
        if ($serviceProviderProjects->first() == null) {
            return $data;
        } else {
            foreach ($serviceProviderProjects as $serviceProviderProject) {
                $progres += $serviceProviderProject->progres;
            }
            if ($data['progres']  + $progres > 100) {
                return false;
            } else {
                return $data;
            }
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $serviceProviderProject
     * @return mixed
     */
    public function update(ServiceProviderProjectRequest $request, ServiceProviderProject $service_provider_project, $serviceProviderProjects): mixed
    {
        $data = $request->validated();
        $progres = 0;
        $old_file = $service_provider_project->file;
        if ($request->hasFile('file')) {
            $this->remove($old_file);
            $old_file = $this->upload(UploadDiskEnum::SERVICEPROVIDERPROJECT->value, $request->file('file'));
        }
        $data['file'] = $old_file;

        foreach ($serviceProviderProjects as $serviceProviderProject) {
            $progres += $serviceProviderProject->progres;
        }
        if ($data['progres']  + ($progres - $service_provider_project->progres) > 100) {
            return false;
        } else {
            return $data;
        }
    }
}
