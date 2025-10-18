<x-layout :title="$invoice->name" :breadcrumbs="['dashboard.invoices.show', $invoice]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('invoices.attributes.name')</th>
                        <td>{{ $invoice->name }}</td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.invoices.partials.actions.edit')
                    @include('dashboard.invoices.partials.actions.delete')
                    @include('dashboard.invoices.partials.actions.restore')
                    @include('dashboard.invoices.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
