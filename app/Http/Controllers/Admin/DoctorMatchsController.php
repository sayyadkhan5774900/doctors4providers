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

        $doctors = collect();

        return view('admin.doctorMatches.index', compact('providers','doctors'));
    }

    public function matchedDoctors(Provider $provider)
    {
        abort_if(Gate::denies('doctor_match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::all()->sortByDesc('created_at');

        $state = $provider->practice_states;

        $budget = $provider->monthly_budget;

        $doctors = Doctor::where('states_licensed',$state)->where('monthly_stipend','<=',$budget)->get();

        return view('admin.doctorMatches.index', compact('providers','doctors'));
    }
}
