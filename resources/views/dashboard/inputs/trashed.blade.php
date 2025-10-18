<x-layout :title="trans('inputs.trashed')" :breadcrumbs="['dashboard.inputs.trashed']">
    @include('dashboard.inputs.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('inputs.actions.list') ({{ $inputs->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Input::class }}"
                    :resource="trans('inputs.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Input::class }}"
                    :resource="trans('inputs.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('inputs.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($inputs as $input)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$input"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.inputs.trashed.show', $input) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $input->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.inputs.partials.actions.show')
                    @include('dashboard.inputs.partials.actions.restore')
                    @include('dashboard.inputs.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('inputs.empty')</td>
            </tr>
        @endforelse

        @if($inputs->hasPages())
            @slot('footer')
                {{ $inputs->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
