@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sendRedactedCvToProvider.title') }}
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Providers</div>
                        <div>States</div>
                        <div>Monthly budget</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group overflow-auto" style="height: 400px">
                            @forelse ($providers as $provider)
                                <a class="text-decoration-none" href="{{ route('admin.matched.doctors.for.send', $provider->id) }}">
                                    <li class="list-group-item d-flex justify-content-between {{ 'admin/send-redacted-cv-to-providers/match/doctor/'.$loop->iteration == request()->path() ? 'active' : '' }}">
                                    <div>{{ $provider->first_name.' '.$provider->last_name }}</div>
                                    <div>{{ $provider->practice_states }}</div>
                                    <div>{{ $provider->monthly_budget }}</div>
                                    </li>
                                </a>
                            @empty
                                <p>No Provider Found</p>
                            @endforelse
                          </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        Matched Doctors
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Doctor">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>
                                            {{ 'CV' }}
                                        </th>
                                        <th>
                                            {{ 'Redacted CV' }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->first_name }}</td>
                                        <td>{{ $doctor->last_name }}</td>
                                        <td>{{ $doctor->email }}</td>
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
                                            @can('send_redacted_cv_to_provider_access')
                                                <form action="{{ route('admin.send-redacted-cv-to-providers.send') }}" method="POST" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-info" value="send">
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <div class="mb-2 text-warning">Not Matching Doctor Found</div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection