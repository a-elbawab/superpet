<x-layout :title="trans('customers.plural')" :breadcrumbs="['dashboard.customers.index']">
    @include('dashboard.accounts.customers.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('customers.actions.list') ({{ count_formatted($customers->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Customer::class }}"
                            :resource="trans('customers.plural')"></x-check-all-delete>
                    <x-import-excel
                            model="{{ \App\Models\Customer::class }}"
                            import="{{ \App\Imports\CustomersImport::class }}"
                            :resource="trans('customers.plural')"></x-import-excel>
                    <x-export-excel
                            model="{{ \App\Models\Customer::class }}"
                            export="{{ \App\Exports\Export::class }}"
                            resource="{{ App\Http\Resources\CustomerResource::class }}"
                            fileName="Customers"
                            ></x-export-excel>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.customers.partials.actions.create')
                        @include('dashboard.accounts.customers.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('customers.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('customers.attributes.email')</th>
            <th>@lang('customers.attributes.phone')</th>
            <th>@lang('customers.attributes.created_at')</th>
            <th>...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>
                    <x-check-all-item :model="$customer"></x-check-all-item>
                </td>
                <td>
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper">
                            <a href="{{ route('dashboard.customers.show', $customer) }}" class="avatar mr-1">
                                <img src="{{ $customer->getAvatar() }}"
                                    alt="{{ $customer->name }}"
                                    height="32"
                                    width="32">
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{ route('dashboard.customers.show', $customer) }}" class="user_name text-truncate text-body">
                                <span class="fw-bolder">{{ $customer->name }}</span>
                            </a>
                            <small class="text-muted">{{ $customer->present()->type }}</small>
                        </div>
                    </div>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $customer->email }}
                </td>
                <td>
                    {{ $customer->phone }}
                </td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>

                <td>
                    @include('dashboard.accounts.customers.partials.actions.show')
                    @include('dashboard.accounts.customers.partials.actions.edit')
                    @include('dashboard.accounts.customers.partials.actions.status')
                    @include('dashboard.accounts.customers.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('customers.empty')</td>
            </tr>
        @endforelse

        @if($customers->hasPages())
            @slot('footer')
                {{ $customers->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
