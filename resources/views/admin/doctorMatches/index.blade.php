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
                        <div class="card mb-0">
                            <div class="card-header">
                                <a href="">Provider</a>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-header">
                                <a href="">Provider</a>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-header">
                                <a href="">Provider</a>
                            </div>
                        </div>
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
                                        <th>
                                            &nbsp;
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