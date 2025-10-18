<x-layout :title="$item->name" :breadcrumbs="['dashboard.items.show', $item]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('items.attributes.name')</th>
                        <td>{!! $item->name !!}</td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.items.partials.actions.edit')
                    @include('dashboard.items.partials.actions.delete')
                    @include('dashboard.items.partials.actions.restore')
                    @include('dashboard.items.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
