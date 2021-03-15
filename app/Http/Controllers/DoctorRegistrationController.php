<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DoctorRegistrationController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'first_name'                  => [
                'string',
                'required',
            ],
            'last_name'                   => [
                'string',
                'required',
            ],
            'email'                       => [
                'required',
            ],
            'phone'                       => [
                'string',
                'required',
            ],
            'address'                     => [
                'required',
            ],
            'practice'                    => [
                'required',
            ],
            'specialization'              => [
                'required',
            ],
            'communication_form'          => [
                'required',
            ],
            'collaborative_communication' => [
                'required',
            ],
            'states_licensed'             => [
                'required',
            ],
            'have_malpractice'            => [
                'required',
            ],
            'monthly_stipend'             => [
                'required',
            ],
            'cv'                          => [
                'required',
            ],
        ]);

        $doctor = Doctor::create($request->all());

        if ($request->input('cv', false)) {
            $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('redacted_cv', false)) {
            $doctor->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $doctor->id]);
        }

        return redirect()->route('frontend.doctors.index');
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Doctor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
