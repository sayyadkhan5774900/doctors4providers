<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProviderRequest;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Provider;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProviderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::with(['media'])->get();

        return view('admin.providers.index', compact('providers'));
    }

    public function create()
    {
        abort_if(Gate::denies('provider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providers.create');
    }

    public function store(StoreProviderRequest $request)
    {
        $provider = Provider::create($request->validated());

        if ($request->input('cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('redacted_cv', false)) {
            $provider->addMedia(storage_path('tmp/uploads/' . basename($request->input('redacted_cv'))))->toMediaCollection('redacted_cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $provider->id]);
        }

        return redirect()->route('admin.providers.index');
    }

    public function edit(Provider $provider)
    {
        abort_if(Gate::denies('provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providers.edit', compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

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

        return redirect()->route('admin.providers.index');
    }

    public function show(Provider $provider)
    {
        abort_if(Gate::denies('provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providers.show', compact('provider'));
    }

    public function destroy(Provider $provider)
    {
        abort_if(Gate::denies('provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provider->delete();

        return back();
    }

    public function massDestroy(MassDestroyProviderRequest $request)
    {
        Provider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('provider_create') && Gate::denies('provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Provider();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
