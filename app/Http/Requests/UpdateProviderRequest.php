<?php

namespace App\Http\Requests;

use App\Models\Provider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProviderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provider_edit');
    }

    public function rules()
    {
        return [
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
        ];
    }
}
