<x-layout :title="trans('teams.plural')" :breadcrumbs="['dashboard.teams.index']">
    @include('dashboard.teams.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('teams.actions.list') ({{ $teams->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Team::class }}"
                        :resource="trans('teams.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.teams.partials.actions.create')
                    @include('dashboard.teams.partials.actions.trashed')
                </div>
            </div>
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
                    <a href="{{ route('dashboard.teams.show', $team) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $team->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.teams.partials.actions.show')
                    @include('dashboard.teams.partials.actions.edit')
                    @include('dashboard.teams.partials.actions.delete')
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
