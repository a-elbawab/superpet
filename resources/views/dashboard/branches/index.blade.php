<x-layout :title="trans('branches.plural')" :breadcrumbs="['dashboard.branches.index']">
    @include('dashboard.branches.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('branches.actions.list') ({{ $branches->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Branch::class }}"
                        :resource="trans('branches.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.branches.partials.actions.create')
                    @include('dashboard.branches.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('branches.attributes.name')</th>
            <th>@lang('branches.attributes.phone')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($branches as $branch)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$branch"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.branches.show', $branch) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $branch->name }}
                    </a>
                </td>

                <td>
                    {{ $branch->phone }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.branches.partials.actions.show')
                    @include('dashboard.branches.partials.actions.edit')
                    @include('dashboard.branches.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('branches.empty')</td>
            </tr>
        @endforelse

        @if($branches->hasPages())
            @slot('footer')
                {{ $branches->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
