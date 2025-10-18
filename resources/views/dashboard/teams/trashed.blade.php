<x-layout :title="trans('teams.trashed')" :breadcrumbs="['dashboard.teams.trashed']">
    @include('dashboard.teams.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('teams.actions.list') ({{ $teams->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <x-check-all-force-delete
                      type="{{ \App\Models\Team::class }}"
                      :resource="trans('teams.plural')"></x-check-all-force-delete>
              <x-check-all-restore
                      type="{{ \App\Models\Team::class }}"
                      :resource="trans('teams.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('teams.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($teams as $team)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$team"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.teams.trashed.show', $team) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $team->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.teams.partials.actions.show')
                    @include('dashboard.teams.partials.actions.restore')
                    @include('dashboard.teams.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('teams.empty')</td>
            </tr>
        @endforelse

        @if($teams->hasPages())
            @slot('footer')
                {{ $teams->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
