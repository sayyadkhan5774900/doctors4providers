<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\Admin\DoctorResource;
use App\Models\Doctor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource(Doctor::all());
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->all());

        if ($request->input('cv', false)) {
            $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('redacted_cv', false)) {
            $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
        }

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource($doctor);
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->all());

        if ($request->input('cv', false)) {
            if (!$doctor->cv || $request->input('cv') !== $doctor->cv->file_name) {
                if ($doctor->cv) {
                    $doctor->cv->delete();
                }

                $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($doctor->cv) {
            $doctor->cv->delete();
        }

        if ($request->input('redacted_cv', false)) {
            if (!$doctor->redacted_cv || $request->input('redacted_cv') !== $doctor->redacted_cv->file_name) {
                if ($doctor->redacted_cv) {
                    $doctor->redacted_cv->delete();
                }

                $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
            }
        } elseif ($doctor->redacted_cv) {
            $doctor->redacted_cv->delete();
        }

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
