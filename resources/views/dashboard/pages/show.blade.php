<x-layout :title="$page->title" :breadcrumbs="['dashboard.pages.show', $page]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('pages.attributes.title')</th>
                        <td>{{ $page->title }}</td>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.pages.partials.actions.edit')
                    @include('dashboard.pages.partials.actions.delete')
                @endslot
            @endcomponent

        </div>
    </div>
    @include('dashboard.items.index')
</x-layout>
