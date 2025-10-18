<x-layout :title="trans('admins.plural')" :breadcrumbs="['dashboard.admins.index']">
    @include('dashboard.accounts.admins.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('admins.actions.list') ({{ count_formatted($admins->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Admin::class }}"
                            :resource="trans('admins.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.admins.partials.actions.create')
                        @include('dashboard.accounts.admins.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('admins.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('admins.attributes.email')</th>
            <th>@lang('admins.attributes.phone')</th>
            <th>@lang('admins.attributes.created_at')</th>
            <th>...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($admins as $admin)
            <tr>
                <td>
                    <x-check-all-item :model="$admin"></x-check-all-item>
                </td>
                <td>
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper">
                            <a href="{{ route('dashboard.admins.show', $admin) }}" class="avatar mr-1">
                                <img src="{{ $admin->getAvatar() }}"
                                    alt="{{ $admin->name }}"
                                    height="32"
                                    width="32">
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{ route('dashboard.admins.show', $admin) }}" class="user_name text-truncate text-body">
                                <span class="fw-bolder">{{ $admin->name }}</span>
                            </a>
                            <small class="text-muted">{{ $admin->present()->type }}</small>
                        </div>
                    </div>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $admin->email }}
                </td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->created_at->format('Y-m-d') }}</td>

                <td>
                    @include('dashboard.accounts.admins.partials.actions.show')
                    @include('dashboard.accounts.admins.partials.actions.edit')
                    @include('dashboard.accounts.admins.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('admins.empty')</td>
            </tr>
        @endforelse

        @if($admins->hasPages())
            @slot('footer')
                {{ $admins->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

