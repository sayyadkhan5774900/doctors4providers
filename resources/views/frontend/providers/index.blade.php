@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('provider_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.providers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.provider.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.provider.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Provider">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.provider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.date_of_agreement') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.communication_form') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.begin_seeing_patients') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.have_malpractice') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.agent_can_contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.have_billing_company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.billing_company_can_contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.monthly_budget') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.provider.fields.percentage_of_chart') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($providers as $key => $provider)
                                    <tr data-entry-id="{{ $provider->id }}">
                                        <td>
                                            {{ $provider->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->date_of_agreement ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->communication_form ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->begin_seeing_patients ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->have_malpractice ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Provider::AGENT_CAN_CONTACT_SELECT[$provider->agent_can_contact] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Provider::HAVE_BILLING_COMPANY_SELECT[$provider->have_billing_company] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Provider::BILLING_COMPANY_CAN_CONTACT_SELECT[$provider->billing_company_can_contact] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->monthly_budget ?? '' }}
                                        </td>
                                        <td>
                                            {{ $provider->percentage_of_chart ?? '' }}
                                        </td>
                                        <td>
                                            @can('provider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.providers.show', $provider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('provider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.providers.edit', $provider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('provider_delete')
                                                <form action="{{ route('frontend.providers.destroy', $provider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('provider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.providers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-Provider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection