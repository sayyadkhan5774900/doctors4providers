<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedactDoctorCvController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('redact_doctor_cv_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::with(['media'])->get();

        return view('admin.redactDoctorCvs.index', compact('doctors'));
    }

    public function edit($id)
    {

        $doctor = Doctor::find($id);

        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.redactDoctorCvs.edit', compact('doctor'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'redacted_cv'                          => [
                'required',
            ],
        ]);

        $doctor = Doctor::find($request['id']);

        $doctor->update($request->all());

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

        return redirect()->route('admin.redact-doctor-cvs.index');
    }

    public function cvDownload($id)
    {
        $doctor = Doctor::with(['media'])->find($id);
        
        return response()->download($doctor->cv->getPath());
    }

    public function redactedDownload($id)
    {
        $doctor = Doctor::with(['media'])->find($id);
        
        return response()->download($doctor->redacted_cv->getPath());
    }

}
