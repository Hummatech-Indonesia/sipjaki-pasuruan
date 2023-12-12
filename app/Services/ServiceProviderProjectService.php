<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderProjectRequest;
use App\Models\Project;
use App\Models\ServiceProviderProject;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

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

    /**
     * downloadFiles
     *
     * @param  mixed $data
     * @return void
     */
    public function downloadFiles(mixed $data)
    {
        if (!$data->isEmpty()) {
            $zip = new ZipArchive;
            $filename = $data->first()->project->name . now() . ".zip";
            if ($zip->open(storage_path('app/public/'.$filename), ZipArchive::CREATE) === TRUE) {
                foreach ($data as $value) {
                    if (Storage::exists($value->file)) {
                        $zip->addFile(storage_path('app/public/'.$value->file), basename($value->file));
                    }
                }
                $zip->close();
                return response()->download(storage_path('app/public/'.$filename))->deleteFileAfterSend(true);
            }
            else {
                return "Gagal membuat zip";
            }
        }
        else {
            return "Data kosong";
        }
    }

    /**
     * download
     *
     * @param  mixed $data
     * @return void
     */
    public function download(mixed $data)
    {
        if (Storage::exists($data)) {
            return response()->download(storage_path('app/public/'.$data), basename($data));
        }
    }
}
