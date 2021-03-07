<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Resources\Admin\ProviderResource;
use App\Models\Provider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProviderApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderResource(Provider::all());
    }

    public function store(StoreProviderRequest $request)
    {
        $provider = Provider::create($request->all());

        if ($request->input('cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('redacted_cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
        }

        return (new ProviderResource($provider))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Provider $provider)
    {
        abort_if(Gate::denies('provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderResource($provider);
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->all());

        if ($request->input('cv', false)) {
            if (!$provider->cv || $request->input('cv') !== $provider->cv->file_name) {
                if ($provider->cv) {
                    $provider->cv->delete();
                }

                $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($provider->cv) {
            $provider->cv->delete();
        }

        if ($request->input('redacted_cv', false)) {
            if (!$provider->redacted_cv || $request->input('redacted_cv') !== $provider->redacted_cv->file_name) {
                if ($provider->redacted_cv) {
                    $provider->redacted_cv->delete();
                }

                $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
            }
        } elseif ($provider->redacted_cv) {
            $provider->redacted_cv->delete();
        }

        return (new ProviderResource($provider))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Provider $provider)
    {
        abort_if(Gate::denies('provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provider->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
