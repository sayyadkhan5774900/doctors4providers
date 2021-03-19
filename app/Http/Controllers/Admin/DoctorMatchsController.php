<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Provider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorMatchsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::all()->sortByDesc('created_at');

        $state = $providers[0]->practice_states;

        $budget = $providers[0]->monthly_budget;

        // ->where('monthly_stipend' <= $budget)

        $doctors = Doctor::where('states_licensed',$state)->get();

        dd($doctors);

        return view('admin.doctorMatches.index');
    }

    public function matchedDoctors(Provider $provider)
    {
        abort_if(Gate::denies('doctor_match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.doctorMatches.index');
    }
}
