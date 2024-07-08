<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ServiceProviderProjectRequest;
use App\Models\ExecutorProject;
use App\Models\Project;
use App\Models\ServiceProviderProject;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
    public function store(ServiceProviderProjectRequest $request, $serviceProviderProjects, ExecutorProject $executorProject): mixed
    {
        if (!$request["type"]) {
            if ($request["date_finish"]) $request->merge(['type' => 'week']);
            else $request->merge(['type' => 'days']);
        }
        if (!$request["date_finish"]) $request->merge(['date_finish' => $request["date_start"]]);
        if (!$request["progres"]) $request->merge(['progres' => 0]);
        $data = $request->validated();

        if (!array_key_exists('date_finish', $data)) $data['date_finish'] = $request["date_start"];
        if (!array_key_exists('progres', $data)) $request['progres'] = 0;

        $progres = 0;
        $data['executor_project_id'] = $executorProject->id;
        if (isset($data['file'])) {
            $data['file'] = $this->upload(UploadDiskEnum::SERVICEPROVIDERPROJECT->value, $request->file('file'));
        }

        if ($serviceProviderProjects->first() == null) {
            return $data;
        } else {
            foreach ($serviceProviderProjects as $serviceProviderProject) {
                $progres += $serviceProviderProject->progres;
            }
            if (($data['progres'] + $executorProject->physical_progress) > 100) {
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
        if (!$request["type"]) {
            if ($request["date_finish"]) $request->merge(['type' => 'week']);
            else $request->merge(['type' => 'days']);
        }
        if (!$request["date_finish"]) $request->merge(['date_finish' => $request["date_start"]]);
        if (!$request["progres"]) $request->merge(['progress' => 0]);
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
        if (($data['progres'] + $service_provider_project->executorProject->physical_progres) > 100) {
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
        if ($data->isNotEmpty()) {
            $zip = new ZipArchive;
            $filename = Str::random() . ".zip";
            if ($zip->open(storage_path('app/public/' . $filename), ZipArchive::CREATE) === true) {
                foreach ($data as $value) {
                    if (Storage::exists($value->file)) {
                        $zip->addFile(storage_path('app/public/' . $value->file), basename($value->file));
                    }
                }
                $zip->close();
                return response()->download(storage_path('app/public/' . $filename))->deleteFileAfterSend(true);
            } else {
                return "Gagal membuat zip";
            }
        } else {
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
        if (Storage::exists($data->file)) {
            $filePath = storage_path('app/public/' . $data->file);
            $customFileName = 'Progress Paket Pekerjaan ' . $data->executorProject->name . ' Minggu ke ' . $data->week . '.pdf';

            return response()->download($filePath, $customFileName);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }
}
