<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Doctor;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DoctorRegistrationController extends Controller
{
    use MediaUploadingTrait;

    public function store(Request $request)
    {
        
        $this->validateData($request);

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

        return redirect()->route('landing')->withMessage('Thank you. We will contact you if we have any further questions. When there is a provider who is a good match for you, we will be sure to get in touch with you. We hope to get back to you soon regarding a potential collaboration.');
    }

    private function validateData(Request $request)
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
    }

}
