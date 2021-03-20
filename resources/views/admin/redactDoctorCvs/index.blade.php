@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.doctor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Doctor">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.email') }}
                        </th>
                        <th>
                            {{ 'CV' }}
                        </th>
                        <th>
                            {{ 'Redacted CV' }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.redacted_cv') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $key => $doctor)
                        <tr class="{{ $doctor->redacted_cv ? 'table-success' : 'table-danger' }}"  data-entry-id="{{ $doctor->id }}">
                            <td>
                                {{ $doctor->id ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->email ?? '' }}
                            </td>
                            <td>
                                @can('doctor_show')
                                    @if($doctor->cv)
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cv.download', $doctor->id) }}">
                                        {{ trans('global.download') }}
                                    </a>
                                    @endif
                                @endcan
                            </td>
                            <td>
                                @can('doctor_show')
                                    @if($doctor->redacted_cv)
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.redacted.cv.download', $doctor->id) }}">
                                        {{ trans('global.download') }}
                                    </a>
                                    @endif
                                @endcan
                            </td>
                            <td>
                                @can('doctor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.redact-doctor-cvs.edit', $doctor->id) }}">
                                        {{ trans('global.upload') }}
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection