<x-layout :title="$invoice->name" :breadcrumbs="['dashboard.invoices.edit', $invoice]">
    {{ BsForm::resource('invoices')->putModel($invoice, route('dashboard.invoices.update', $invoice)) }}
    @component('dashboard::components.box')
        @slot('title', trans('invoices.actions.edit'))

        @include('dashboard.invoices.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('invoices.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>