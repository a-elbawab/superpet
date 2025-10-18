<x-layout :title="trans('tags.plural')" :breadcrumbs="['dashboard.tags.index']">
    @include('dashboard.tags.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('tags.actions.list') ({{ $tags->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Tag::class }}"
                        :resource="trans('tags.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.tags.partials.actions.create')
                    @include('dashboard.tags.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('tags.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$tag"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.tags.show', $tag) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $tag->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.tags.partials.actions.show')
                    @include('dashboard.tags.partials.actions.edit')
                    @include('dashboard.tags.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('tags.empty')</td>
            </tr>
        @endforelse

        @if($tags->hasPages())
            @slot('footer')
                {{ $tags->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
