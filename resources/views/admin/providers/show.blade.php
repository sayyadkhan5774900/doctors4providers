@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.provider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.id') }}
                        </th>
                        <td>
                            {{ $provider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.name') }}
                        </th>
                        <td>
                            {{ $provider->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.email') }}
                        </th>
                        <td>
                            {{ $provider->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.phone') }}
                        </th>
                        <td>
                            {{ $provider->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.date_of_agreement') }}
                        </th>
                        <td>
                            {{ $provider->date_of_agreement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.practice') }}
                        </th>
                        <td>
                            {{ $provider->practice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.current_licensure') }}
                        </th>
                        <td>
                            {{ $provider->current_licensure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.collaborative_need') }}
                        </th>
                        <td>
                            {{ $provider->collaborative_need }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.practice_states') }}
                        </th>
                        <td>
                            {{ $provider->practice_states }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.communication_form') }}
                        </th>
                        <td>
                            {{ $provider->communication_form }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.collaborative_communication') }}
                        </th>
                        <td>
                            {{ $provider->collaborative_communication }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.emr_system') }}
                        </th>
                        <td>
                            {{ $provider->emr_system }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.meeting_time') }}
                        </th>
                        <td>
                            {{ $provider->meeting_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.begin_seeing_patients') }}
                        </th>
                        <td>
                            {{ $provider->begin_seeing_patients }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.have_malpractice') }}
                        </th>
                        <td>
                            {{ App\Models\Provider::HAVE_MALPRACTICE_SELECT[$provider->have_malpractice] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.agent_can_contact') }}
                        </th>
                        <td>
                            {{ App\Models\Provider::AGENT_CAN_CONTACT_SELECT[$provider->agent_can_contact] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.have_billing_company') }}
                        </th>
                        <td>
                            {{ App\Models\Provider::HAVE_BILLING_COMPANY_SELECT[$provider->have_billing_company] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.billing_company_can_contact') }}
                        </th>
                        <td>
                            {{ App\Models\Provider::BILLING_COMPANY_CAN_CONTACT_SELECT[$provider->billing_company_can_contact] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.monthly_budget') }}
                        </th>
                        <td>
                            {{ $provider->monthly_budget }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.additional_notes') }}
                        </th>
                        <td>
                            {{ $provider->additional_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.percentage_of_chart') }}
                        </th>
                        <td>
                            {{ $provider->percentage_of_chart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.need_prescriptive_authority') }}
                        </th>
                        <td>
                            {{ $provider->need_prescriptive_authority }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.prescribing_substances') }}
                        </th>
                        <td>
                            {{ $provider->prescribing_substances }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.provider_need_collaborative_speak') }}
                        </th>
                        <td>
                            {{ $provider->provider_need_collaborative_speak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.unique_request') }}
                        </th>
                        <td>
                            {{ $provider->unique_request }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provider.fields.cv') }}
                        </th>
                        <td>
                            @if($provider->cv)
                                <a href="{{ $provider->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.providers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection