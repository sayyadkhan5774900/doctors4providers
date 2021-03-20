<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Doctor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedactedCvController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('redacted_cv_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.redactedCvs.index');
    }
}
