<x-layout :title="trans('pages.plural')" :breadcrumbs="['dashboard.pages.index']">
    @include('dashboard.pages.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title', trans('pages.actions.list'))
        @slot('tools')
            @include('dashboard.pages.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('pages.attributes.title')</th>
            <th>...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pages as $page)
            <tr>
                <td>
                    <a href="{{ route('dashboard.pages.show', $page) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $page->title }}
                    </a>
                </td>
                <td>
                    @include('dashboard.pages.partials.actions.show')
                    @include('dashboard.pages.partials.actions.edit')
                    @include('dashboard.pages.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('pages.empty')</td>
            </tr>
        @endforelse

        @if($pages->hasPages())
            @slot('footer')
                {{ $pages->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
