<form method="POST" action="{{ route("doctors.registration.store") }}" enctype="multipart/form-data">
    @method('POST')
    @csrf
   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.doctor.fields.first_name') }}</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.first_name_helper') }}</span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.doctor.fields.last_name') }}</label>
                <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.last_name_helper') }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.doctor.fields.email') }}</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.email_helper') }}</span>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.doctor.fields.phone') }}</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.phone_helper') }}</span>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.doctor.fields.address') }}</label>
                <textarea class="form-control" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.address_helper') }}</span>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="practice">{{ trans('cruds.doctor.fields.practice') }}</label>
                <textarea class="form-control" name="practice" id="practice" required>{{ old('practice') }}</textarea>
                @if($errors->has('practice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('practice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.practice_helper') }}</span>
            </div>
        </div>
    </div>
  
    <div class="form-group">
        <label for="experience">{{ trans('cruds.doctor.fields.experience') }}</label>
        <textarea class="form-control" name="experience" id="experience">{{ old('experience') }}</textarea>
        @if($errors->has('experience'))
            <div class="invalid-feedback">
                {{ $errors->first('experience') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.doctor.fields.experience_helper') }}</span>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="specialization">{{ trans('cruds.doctor.fields.specialization') }}</label>
                <textarea class="form-control" name="specialization" id="specialization" required>{{ old('specialization') }}</textarea>
                @if($errors->has('specialization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.specialization_helper') }}</span>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="certifications">{{ trans('cruds.doctor.fields.certifications') }}</label>
                <textarea class="form-control" name="certifications" id="certifications">{{ old('certifications') }}</textarea>
                @if($errors->has('certifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certifications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.certifications_helper') }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="communication_form">{{ trans('cruds.doctor.fields.communication_form') }}</label>
                <textarea class="form-control" name="communication_form" id="communication_form" required>{{ old('communication_form') }}</textarea>
                @if($errors->has('communication_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.communication_form_helper') }}</span>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="collaborative_communication">{{ trans('cruds.doctor.fields.collaborative_communication') }}</label>
                <textarea class="form-control" name="collaborative_communication" id="collaborative_communication" required>{{ old('collaborative_communication') }}</textarea>
                @if($errors->has('collaborative_communication'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collaborative_communication') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.collaborative_communication_helper') }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="states_licensed">{{ trans('cruds.doctor.fields.states_licensed') }}</label>
                <textarea class="form-control" name="states_licensed" id="states_licensed" required>{{ old('states_licensed') }}</textarea>
                @if($errors->has('states_licensed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('states_licensed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.states_licensed_helper') }}</span>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="have_malpractice">{{ trans('cruds.doctor.fields.have_malpractice') }}</label>
                <textarea class="form-control" name="have_malpractice" id="have_malpractice" required>{{ old('have_malpractice') }}</textarea>
                @if($errors->has('have_malpractice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('have_malpractice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.have_malpractice_helper') }}</span>
            </div>
        </div>
    </div>
  
    <div class="form-group">
        <label for="additional_notes">{{ trans('cruds.doctor.fields.additional_notes') }}</label>
        <textarea class="form-control" name="additional_notes" id="additional_notes">{{ old('additional_notes') }}</textarea>
        @if($errors->has('additional_notes'))
            <div class="invalid-feedback">
                {{ $errors->first('additional_notes') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.doctor.fields.additional_notes_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="monthly_stipend">{{ trans('cruds.doctor.fields.monthly_stipend') }}</label>
        <textarea class="form-control" name="monthly_stipend" id="monthly_stipend" required>{{ old('monthly_stipend') }}</textarea>
        @if($errors->has('monthly_stipend'))
            <div class="invalid-feedback">
                {{ $errors->first('monthly_stipend') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.doctor.fields.monthly_stipend_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="cv">{{ trans('cruds.doctor.fields.cv') }}</label>
        <div class="needsclick dropzone" id="cv-dropzone">
        </div>
        @if($errors->has('cv'))
            <div class="invalid-feedback">
                {{ $errors->first('cv') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.doctor.fields.cv_helper') }}</span>
    </div>
    <div class="form-group">
        <button class="btn btn-danger btn-lg btn-block" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>