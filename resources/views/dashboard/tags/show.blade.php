<x-layout :title="$tag->name" :breadcrumbs="['dashboard.tags.show', $tag]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('tags.attributes.name')</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.tags.partials.actions.edit')
                    @include('dashboard.tags.partials.actions.delete')
                    @include('dashboard.tags.partials.actions.restore')
                    @include('dashboard.tags.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
