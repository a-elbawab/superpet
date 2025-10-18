<x-layout :title="trans('countries.plural')" :breadcrumbs="['dashboard.countries.index']">
    @include('dashboard.countries.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('countries.actions.list'))
        @slot('tools')
            @include('dashboard.countries.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('countries.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('countries.attributes.code')</th>
            <th class="d-none d-md-table-cell">@lang('countries.attributes.key')</th>
            <th class="d-none d-md-table-cell">@lang('countries.attributes.is_default')</th>
            <th>...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($countries as $country)
            <tr>
                <td>
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper">
                            <a href="{{ route('dashboard.countries.show', $country) }}" class="avatar mr-1">
                                <img src="{{ $country->getFirstMediaUrl('flags') }}"
                                    alt="{{ $country->name }}"
                                    height="32"
                                    width="32">
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{ route('dashboard.countries.show', $country) }}" class="user_name text-truncate text-body">
                                <span class="fw-bolder">{{ $country->name }}</span>
                            </a>
                        </div>
                    </div>
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $country->code }}
                </td>
                <td class="d-none d-md-table-cell">
                    {{ $country->key }}
                </td>
                <td class="d-none d-md-table-cell">
                    @include('dashboard.countries.partials.flags.default')
                </td>

                <td>
                    @include('dashboard.countries.partials.actions.show')
                    @include('dashboard.countries.partials.actions.edit')
                    @include('dashboard.countries.partials.actions.status')
                    @include('dashboard.countries.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('countries.empty')</td>
            </tr>
        @endforelse

        @if($countries->hasPages())
            @slot('footer')
                {{ $countries->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
