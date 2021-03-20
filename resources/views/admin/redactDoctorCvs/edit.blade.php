@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.doctor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.uplaod-redacted-doctor-cvs") }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" name="id" id="id" value="{{ old('id', $doctor->id) }}">
            </div>
            <div class="form-group">
                <label class="required" for="redacted_cv">{{ trans('cruds.doctor.fields.redacted_cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('redacted_cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('redacted_cv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('redacted_cv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.redacted_cv_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger btn-block" type="submit">
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
      $('form').find('input[name="redacted_cv"]').remove()
      $('form').append('<input type="hidden" name="redacted_cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="redacted_cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($doctor) && $doctor->redacted_cv)
      var file = {!! json_encode($doctor->redacted_cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="redacted_cv" value="' + file.file_name + '">')
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