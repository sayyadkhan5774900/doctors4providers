<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Provider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendRedactedCvToProviderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('send_redacted_cv_to_provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::all();

        $doctors = collect();

        return view('admin.sendRedactedCvToProviders.index',compact('providers', 'doctors'));
    }

    public function matchedDoctors(Provider $provider)
    {
        abort_if(Gate::denies('doctor_match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::all()->sortByDesc('created_at');

        $state = $provider->practice_states;

        $budget = $provider->monthly_budget;

        $searchedDoctors = Doctor::where('states_licensed',$state)->where('monthly_stipend','<=',$budget)->get();

        $doctors = $searchedDoctors->filter(function ($doctor) {
            return $doctor->redacted_cv;
        });;

        return view('admin.sendRedactedCvToProviders.index', compact('providers','doctors'));
    }


    public function send(Request $request)
    {
        abort_if(Gate::denies('send_redacted_cv_to_provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request['provider']);

        return redirect()->route('admin.send-redacted-cv-to-providers.index')->withMessage('CV is sent successfully');
    }
}
