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
                    <div class="card-header">
                        Providers
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <a href="#"> <li class="list-group-item active">Cras justo odio</li></a>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                          </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        Matches
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Doctor">
                                <thead>
                                    <tr>
                                        <th>
                                            First Name
                                        </th>
                                        <th>
                                            Last Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            State Licenced
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            John
                                        </td>
                                        <td>
                                            White
                                        </td>
                                        <td>
                                            john@doctor.com
                                        </td>
                                        <td>
                                            26152 72817 7878
                                        </td>
                                        <td>
                                            California
                                        </td>
                                        <td>
                                                            
                                        </td>
            
                                    </tr>
                                    <tr>
                                        <td>
                                            John
                                        </td>
                                        <td>
                                            White
                                        </td>
                                        <td>
                                            john@doctor.com
                                        </td>
                                        <td>
                                            26152 72817 7878
                                        </td>
                                        <td>
                                            California
                                        </td>
                                        <td>
                                                            
                                        </td>
            
                                    </tr>
                                    <tr>
                                        <td>
                                            John
                                        </td>
                                        <td>
                                            White
                                        </td>
                                        <td>
                                            john@doctor.com
                                        </td>
                                        <td>
                                            26152 72817 7878
                                        </td>
                                        <td>
                                            California
                                        </td>
                                        <td>
                                                            
                                        </td>
            
                                    </tr>
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