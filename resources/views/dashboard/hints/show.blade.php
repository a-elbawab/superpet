<x-layout :title="$hint->id" :breadcrumbs="['dashboard.hints.show', $hint]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('products.plural')</th>
                        <td><a href="{{ route('dashboard.products.show', $hint->product) }}">{{ optional($hint->product)->name }}</a></td>
                    </tr>
                    <tr>
                        <th width="200">@lang('users.plural')</th>
                        <td><a href="{{ route('dashboard.customers.show', $hint->user) }}">{{ optional($hint->user)->name }}</a></td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.hints.partials.actions.delete')
                    @include('dashboard.hints.partials.actions.restore')
                    @include('dashboard.hints.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
