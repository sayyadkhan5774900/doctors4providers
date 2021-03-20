@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.doctorMatch.title') }}
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
                                <a class="text-decoration-none" href="{{ route('admin.matched.doctors', $provider->id) }}">
                                    <li class="list-group-item d-flex justify-content-between {{ 'admin/doctor-matches/'.$loop->iteration == request()->path() ? 'active' : '' }}">
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
                                        <th>Phone</th>
                                        <th>State Licenced</th>
                                        <th>Monthly Stipend</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->first_name }}</td>
                                        <td>{{ $doctor->last_name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->states_licensed }}</td>
                                        <td>{{ $doctor->monthly_stipend }}</td>
                                        
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