@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card">
            <div class="my-2 p-2 text-center text-primary h4">Create an Account!</div>
            <div class="card-body">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-doctor-tab" data-toggle="tab" href="#nav-doctor" role="tab" aria-controls="nav-doctor" aria-selected="true">Register as Doctor</a>
                  <a class="nav-item nav-link" id="nav-provider-tab" data-toggle="tab" href="#nav-provider" role="tab" aria-controls="nav-provider" aria-selected="false">Register as Provider</a>
                </div>
              </nav>
            
              <div class="mt-4">
                  <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-doctor" role="tabpanel" aria-labelledby="nav-doctor-tab">

                          @include('partials.frontend.docter_registration_form')

                      </div>
                      <div class="tab-pane fade" id="nav-provider" role="tabpanel" aria-labelledby="nav-provider-tab">

                          @include('partials.frontend.provider_registration_form')

                      </div>
                  </div>
              </div>

            </div>
          </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>

$(document).ready(function(){
  document.getElementById('have_billing_company').addEventListener('change', function () {
    var style = this.value == 'no' ? 'block' : 'none';
    document.getElementById('billing_company_can_contact_show').style.display = style;
});
});

</script>

<script>
    Dropzone.options.cvDropzoneone = {
    url: '{{ route('doctors.registration.storeMedia') }}',
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
      $('#docter_form').find('input[name="cv"]').remove()
      $('#docter_form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('#docter_form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($doctor) && $doctor->cv)
      var file = {!! json_encode($doctor->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('#docter_form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
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

<script>
  Dropzone.options.cvDropzonetwo = {
  url: '{{ route('providers.registration.storeMedia') }}',
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
    $('#provider_form').find('input[name="cv"]').remove()
    $('#provider_form').append('<input type="hidden" name="cv" value="' + response.name + '">')
  },
  removedfile: function (file) {
    file.previewElement.remove()
    if (file.status !== 'error') {
      $('#provider_form').find('input[name="cv"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    }
  },
  init: function () {
@if(isset($provider) && $provider->cv)
    var file = {!! json_encode($provider->cv) !!}
        this.options.addedfile.call(this, file)
    file.previewElement.classList.add('dz-complete')
    $('#provider_form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
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