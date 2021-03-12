<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctor_edit');
    }

    public function rules()
    {
        return [
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
        ];
    }
}
