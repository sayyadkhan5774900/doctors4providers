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

        $allDoctors = Doctor::all();

        $doctors = $allDoctors->filter(function ($doctor) {
            return $doctor->redacted_cv;
        });;

        return view('admin.sendRedactedCvToProviders.index',compact('providers', 'doctors'));
    }

    public function send(Request $request)
    {
        abort_if(Gate::denies('send_redacted_cv_to_provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request['provider']);

        return redirect()->route('admin.send-redacted-cv-to-providers.index')->withMessage('CV is sent successfully');
    }
}
