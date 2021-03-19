@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.doctor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doctors.update", [$doctor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.doctor.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $doctor->first_name) }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.doctor.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $doctor->last_name) }}" required>
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.doctor.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $doctor->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.doctor.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $doctor->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.doctor.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address', $doctor->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="practice">{{ trans('cruds.doctor.fields.practice') }}</label>
                <textarea class="form-control {{ $errors->has('practice') ? 'is-invalid' : '' }}" name="practice" id="practice" required>{{ old('practice', $doctor->practice) }}</textarea>
                @if($errors->has('practice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.practice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience">{{ trans('cruds.doctor.fields.experience') }}</label>
                <textarea class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" name="experience" id="experience">{{ old('experience', $doctor->experience) }}</textarea>
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specialization">{{ trans('cruds.doctor.fields.specialization') }}</label>
                <textarea class="form-control {{ $errors->has('specialization') ? 'is-invalid' : '' }}" name="specialization" id="specialization" required>{{ old('specialization', $doctor->specialization) }}</textarea>
                @if($errors->has('specialization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.specialization_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certifications">{{ trans('cruds.doctor.fields.certifications') }}</label>
                <textarea class="form-control {{ $errors->has('certifications') ? 'is-invalid' : '' }}" name="certifications" id="certifications">{{ old('certifications', $doctor->certifications) }}</textarea>
                @if($errors->has('certifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certifications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.certifications_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="communication_form">{{ trans('cruds.doctor.fields.communication_form') }}</label>
                <textarea class="form-control {{ $errors->has('communication_form') ? 'is-invalid' : '' }}" name="communication_form" id="communication_form" required>{{ old('communication_form', $doctor->communication_form) }}</textarea>
                @if($errors->has('communication_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.communication_form_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="collaborative_communication">{{ trans('cruds.doctor.fields.collaborative_communication') }}</label>
                <textarea class="form-control {{ $errors->has('collaborative_communication') ? 'is-invalid' : '' }}" name="collaborative_communication" id="collaborative_communication" required>{{ old('collaborative_communication', $doctor->collaborative_communication) }}</textarea>
                @if($errors->has('collaborative_communication'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collaborative_communication') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.collaborative_communication_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="states_licensed">{{ trans('cruds.doctor.fields.states_licensed') }}</label>
                <textarea class="form-control {{ $errors->has('states_licensed') ? 'is-invalid' : '' }}" name="states_licensed" id="states_licensed" required>{{ old('states_licensed', $doctor->states_licensed) }}</textarea>
                @if($errors->has('states_licensed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('states_licensed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.states_licensed_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="have_malpractice">{{ trans('cruds.doctor.fields.have_malpractice') }}</label>
                <textarea class="form-control {{ $errors->has('have_malpractice') ? 'is-invalid' : '' }}" name="have_malpractice" id="have_malpractice" required>{{ old('have_malpractice', $doctor->have_malpractice) }}</textarea>
                @if($errors->has('have_malpractice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('have_malpractice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.have_malpractice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_notes">{{ trans('cruds.doctor.fields.additional_notes') }}</label>
                <textarea class="form-control {{ $errors->has('additional_notes') ? 'is-invalid' : '' }}" name="additional_notes" id="additional_notes">{{ old('additional_notes', $doctor->additional_notes) }}</textarea>
                @if($errors->has('additional_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.additional_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="monthly_stipend">{{ trans('cruds.doctor.fields.monthly_stipend') }}</label>
                <input class="form-control {{ $errors->has('monthly_stipend') ? 'is-invalid' : '' }}" type="number" name="monthly_stipend" id="monthly_stipend" value="{{ old('monthly_stipend', $doctor->monthly_stipend) }}" step="0.01" required>
                @if($errors->has('monthly_stipend'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_stipend') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.monthly_stipend_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cv">{{ trans('cruds.doctor.fields.cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('cv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.cv_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('admin.doctors.storeMedia') }}',
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
@if(isset($doctor) && $doctor->cv)
      var file = {!! json_encode($doctor->cv) !!}
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