<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Provider;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProviderRegistrationController extends Controller
{
    use MediaUploadingTrait;

    public function store(Request $request)
    {

        $this->validateData($request);

        $provider = Provider::create($request->all());

        if ($request->input('cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('redacted_cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $provider->id]);
        }

        return redirect()->route('landing')->withMessage('We have matched you with a doctor in our database and we (or the doctor) will be getting back with you shortly with your match');
    }

    private function validateData(Request $request)
    {
        $request->validate([
            'first_name'                        => [
                'string',
                'required',
            ],
            'last_name'                         => [
                'string',
                'required',
            ],
            'email'                             => [
                'required',
            ],
            'phone'                             => [
                'string',
                'required',
            ],
            'date_of_agreement'                 => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'collaborative_need'                => [
                'required',
            ],
            'practice_states'                   => [
                'string',
                'required',
            ],
            'communication_form'                => [
                'required',
            ],
            'collaborative_communication'       => [
                'required',
            ],
            'begin_seeing_patients'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'have_malpractice'                  => [
                'string',
                'required',
            ],
            'have_billing_company'              => [
                'required',
            ],
            'monthly_budget'                    => [
                'required',
            ],
            'percentage_of_chart'               => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'need_prescriptive_authority'       => [
                'string',
                'required',
            ],
            'prescribing_substances'            => [
                'required',
            ],
            'provider_need_collaborative_speak' => [
                'string',
                'nullable',
            ],
        ]);
    }
}
