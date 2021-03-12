<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateInformationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('update_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.updateInformations.index');
    }
}
