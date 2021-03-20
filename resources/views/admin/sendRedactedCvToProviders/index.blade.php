@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sendRedactedCvToProvider.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.send-redacted-cv-to-providers.send") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Select Provider</label>
                <select class="form-control {{ $errors->has('provider') ? 'is-invalid' : '' }}" name="provider" id="provider">
                    <option value disabled {{ old('provider', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}" {{ old('provider', '') === $provider->id ? 'selected' : '' }}>{{ $provider->first_name.' '.$provider->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider') }}
                    </div>
                @endif
            </div>
           
            <div class="form-group">
                <label>Select the doctor whose CV you want to send</label>
                <select class="form-control {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor" id="doctor">
                    <option value disabled {{ old('doctor', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor', '') === $doctor->id ? 'selected' : '' }}>{{ $doctor->first_name.' '.$doctor->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doctor') }}
                    </div>
                @endif
            </div>
           
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.send') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection