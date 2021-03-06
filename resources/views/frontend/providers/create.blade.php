@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.provider.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.providers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.provider.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.provider.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.provider.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.provider.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date_of_agreement">{{ trans('cruds.provider.fields.date_of_agreement') }}</label>
                            <input class="form-control date" type="text" name="date_of_agreement" id="date_of_agreement" value="{{ old('date_of_agreement') }}" required>
                            @if($errors->has('date_of_agreement'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_agreement') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.date_of_agreement_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="practice">{{ trans('cruds.provider.fields.practice') }}</label>
                            <textarea class="form-control" name="practice" id="practice">{{ old('practice') }}</textarea>
                            @if($errors->has('practice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('practice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.practice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="current_licensure">{{ trans('cruds.provider.fields.current_licensure') }}</label>
                            <textarea class="form-control" name="current_licensure" id="current_licensure">{{ old('current_licensure') }}</textarea>
                            @if($errors->has('current_licensure'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_licensure') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.current_licensure_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="collaborative_need">{{ trans('cruds.provider.fields.collaborative_need') }}</label>
                            <textarea class="form-control" name="collaborative_need" id="collaborative_need" required>{{ old('collaborative_need') }}</textarea>
                            @if($errors->has('collaborative_need'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('collaborative_need') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.collaborative_need_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="practice_states">{{ trans('cruds.provider.fields.practice_states') }}</label>
                            <input class="form-control" type="text" name="practice_states" id="practice_states" value="{{ old('practice_states', '') }}" required>
                            @if($errors->has('practice_states'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('practice_states') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.practice_states_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="communication_form">{{ trans('cruds.provider.fields.communication_form') }}</label>
                            <textarea class="form-control" name="communication_form" id="communication_form" required>{{ old('communication_form') }}</textarea>
                            @if($errors->has('communication_form'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('communication_form') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.communication_form_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="collaborative_communication">{{ trans('cruds.provider.fields.collaborative_communication') }}</label>
                            <textarea class="form-control" name="collaborative_communication" id="collaborative_communication" required>{{ old('collaborative_communication') }}</textarea>
                            @if($errors->has('collaborative_communication'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('collaborative_communication') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.collaborative_communication_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="emr_system">{{ trans('cruds.provider.fields.emr_system') }}</label>
                            <textarea class="form-control" name="emr_system" id="emr_system">{{ old('emr_system') }}</textarea>
                            @if($errors->has('emr_system'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emr_system') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.emr_system_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meeting_time">{{ trans('cruds.provider.fields.meeting_time') }}</label>
                            <textarea class="form-control" name="meeting_time" id="meeting_time">{{ old('meeting_time') }}</textarea>
                            @if($errors->has('meeting_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meeting_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.meeting_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="begin_seeing_patients">{{ trans('cruds.provider.fields.begin_seeing_patients') }}</label>
                            <input class="form-control date" type="text" name="begin_seeing_patients" id="begin_seeing_patients" value="{{ old('begin_seeing_patients') }}">
                            @if($errors->has('begin_seeing_patients'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('begin_seeing_patients') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.begin_seeing_patients_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="have_malpractice">{{ trans('cruds.provider.fields.have_malpractice') }}</label>
                            <input class="form-control" type="text" name="have_malpractice" id="have_malpractice" value="{{ old('have_malpractice', '') }}" required>
                            @if($errors->has('have_malpractice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('have_malpractice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.have_malpractice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.provider.fields.agent_can_contact') }}</label>
                            <select class="form-control" name="agent_can_contact" id="agent_can_contact">
                                <option value disabled {{ old('agent_can_contact', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Provider::AGENT_CAN_CONTACT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('agent_can_contact', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agent_can_contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('agent_can_contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.agent_can_contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.provider.fields.have_billing_company') }}</label>
                            <select class="form-control" name="have_billing_company" id="have_billing_company" required>
                                <option value disabled {{ old('have_billing_company', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Provider::HAVE_BILLING_COMPANY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('have_billing_company', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('have_billing_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('have_billing_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.have_billing_company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.provider.fields.billing_company_can_contact') }}</label>
                            <select class="form-control" name="billing_company_can_contact" id="billing_company_can_contact">
                                <option value disabled {{ old('billing_company_can_contact', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Provider::BILLING_COMPANY_CAN_CONTACT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('billing_company_can_contact', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('billing_company_can_contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('billing_company_can_contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.billing_company_can_contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="monthly_budget">{{ trans('cruds.provider.fields.monthly_budget') }}</label>
                            <input class="form-control" type="number" name="monthly_budget" id="monthly_budget" value="{{ old('monthly_budget', '') }}" step="0.01" required>
                            @if($errors->has('monthly_budget'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('monthly_budget') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.monthly_budget_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="additional_notes">{{ trans('cruds.provider.fields.additional_notes') }}</label>
                            <textarea class="form-control" name="additional_notes" id="additional_notes">{{ old('additional_notes') }}</textarea>
                            @if($errors->has('additional_notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('additional_notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.additional_notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="percentage_of_chart">{{ trans('cruds.provider.fields.percentage_of_chart') }}</label>
                            <input class="form-control" type="number" name="percentage_of_chart" id="percentage_of_chart" value="{{ old('percentage_of_chart', '') }}" step="1" required>
                            @if($errors->has('percentage_of_chart'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('percentage_of_chart') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.percentage_of_chart_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="need_prescriptive_authority">{{ trans('cruds.provider.fields.need_prescriptive_authority') }}</label>
                            <input class="form-control" type="text" name="need_prescriptive_authority" id="need_prescriptive_authority" value="{{ old('need_prescriptive_authority', '') }}" required>
                            @if($errors->has('need_prescriptive_authority'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('need_prescriptive_authority') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.need_prescriptive_authority_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="prescribing_substances">{{ trans('cruds.provider.fields.prescribing_substances') }}</label>
                            <textarea class="form-control" name="prescribing_substances" id="prescribing_substances" required>{{ old('prescribing_substances') }}</textarea>
                            @if($errors->has('prescribing_substances'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('prescribing_substances') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.prescribing_substances_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="provider_need_collaborative_speak">{{ trans('cruds.provider.fields.provider_need_collaborative_speak') }}</label>
                            <input class="form-control" type="text" name="provider_need_collaborative_speak" id="provider_need_collaborative_speak" value="{{ old('provider_need_collaborative_speak', '') }}">
                            @if($errors->has('provider_need_collaborative_speak'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('provider_need_collaborative_speak') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.provider_need_collaborative_speak_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="unique_request">{{ trans('cruds.provider.fields.unique_request') }}</label>
                            <textarea class="form-control" name="unique_request" id="unique_request">{{ old('unique_request') }}</textarea>
                            @if($errors->has('unique_request'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('unique_request') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.unique_request_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cv">{{ trans('cruds.provider.fields.cv') }}</label>
                            <div class="needsclick dropzone" id="cv-dropzone">
                            </div>
                            @if($errors->has('cv'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cv') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.provider.fields.cv_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('frontend.providers.storeMedia') }}',
    maxFilesize: 15, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15
    },
    success: function (file, response) {
      $('form').find('input[name="cv"]').remove()
      $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($provider) && $provider->cv)
      var file = {!! json_encode($provider->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection