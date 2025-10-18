<x-layout :title="$variation->name" :breadcrumbs="['dashboard.variations.show', $variation]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('variations.variations.name')</th>
                            <td>{{ $variation->name }}</td>
                        </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.variations.partials.actions.edit')
                    @include('dashboard.variations.partials.actions.delete')
                    @include('dashboard.variations.partials.actions.restore')
                    @include('dashboard.variations.partials.actions.forceDelete')
                @endslot
            @endcomponent

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('variations.actions.list') ({{ $variations->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\variation::class }}"
                        :resource="trans('variations.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.variations.partials.actions.create')
                    @include('dashboard.variations.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('variations.variations.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($variations as $variation)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$variation"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.variations.show', $variation) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $variation->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.variations.partials.actions.show')
                    @include('dashboard.variations.partials.actions.edit')
                    @include('dashboard.variations.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('variations.empty')</td>
            </tr>
        @endforelse

        @if($variations->hasPages())
            @slot('footer')
                {{ $variations->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
        </div>
    </div>
</x-layout>
