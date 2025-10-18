<x-layout :title="trans('hints.plural')" :breadcrumbs="['dashboard.hints.index']">
    @include('dashboard.hints.partials.filter')

    @component('dashboard::components.table-box')
    @slot('title')
    @lang('hints.actions.list') ({{ $hints->total() }})
    @endslot

    <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete type="{{ \App\Models\Hint::class }}"
                        :resource="trans('hints.plural')"></x-check-all-delete>
                </div>
            </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
                <x-check-all></x-check-all>
            </th>
            <th>@lang('products.singular')</th>
            <th>@lang('users.singular')</th>
            <th style="width: 160px">...</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($hints as $hint)
            <tr>
                <td class="text-center">
                    <x-check-all-item :model="$hint"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.hints.show', $hint) }}" class="text-decoration-none text-ellipsis">
                        {{ optional($hint->product)->name }}
                    </a>
                </td>
                <td><a href="{{ route('dashboard.customers.show', $hint->user) }}">{{ optional($hint->user)->name }}</a>
                </td>

                <td>
                    {{ $hint->created_at->diffForHumans() }}
                </td>
                <td style="width: 160px">
                    @include('dashboard.hints.partials.actions.show')
                    @include('dashboard.hints.partials.actions.done')
                    @include('dashboard.hints.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('hints.empty')</td>
            </tr>
        @endforelse

        @if ($hints->hasPages())
            @slot('footer')
            {{ $hints->appends(request()->query())->links() }}
            @endslot
        @endif
        @endcomponent
</x-layout>