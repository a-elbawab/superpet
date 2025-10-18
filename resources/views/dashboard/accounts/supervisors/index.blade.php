<x-layout :title="trans('supervisors.plural')" :breadcrumbs="['dashboard.supervisors.index']">
    @include('dashboard.accounts.supervisors.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('supervisors.actions.list') ({{ count_formatted($supervisors->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-delete
                        type="{{ \App\Models\Supervisor::class }}"
                        :resource="trans('supervisors.plural')"></x-check-all-delete>

                @include('dashboard.accounts.supervisors.partials.actions.create')
                @include('dashboard.accounts.supervisors.partials.actions.trashed')
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('supervisors.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('supervisors.attributes.email')</th>
            <th>@lang('supervisors.attributes.phone')</th>
            <th>@lang('supervisors.attributes.created_at')</th>
            <th>...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($supervisors as $supervisor)
            <tr>
                <td>
                    <x-check-all-item :model="$supervisor"></x-check-all-item>
                </td>
                <td>
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper">
                            <a href="{{ route('dashboard.supervisors.show', $supervisor) }}" class="avatar mr-1">
                                <img src="{{ $supervisor->getAvatar() }}"
                                    alt="{{ $supervisor->name }}"
                                    height="32"
                                    width="32">
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{ route('dashboard.supervisors.show', $supervisor) }}" class="user_name text-truncate text-body">
                                <span class="fw-bolder">{{ $supervisor->name }}</span>
                            </a>
                            <small class="text-muted">{{ $supervisor->present()->type }}</small>
                        </div>
                    </div>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $supervisor->email }}
                </td>
                <td>
                    {{ $supervisor->phone }}
                </td>
                <td>{{ $supervisor->created_at->format('Y-m-d') }}</td>

                <td>
                    @include('dashboard.accounts.supervisors.partials.actions.impersonate')
                    @include('dashboard.accounts.supervisors.partials.actions.edit')
                    @include('dashboard.accounts.supervisors.partials.actions.status')
                    @include('dashboard.accounts.supervisors.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('supervisors.empty')</td>
            </tr>
        @endforelse

        @if($supervisors->hasPages())
            @slot('footer')
                {{ $supervisors->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
