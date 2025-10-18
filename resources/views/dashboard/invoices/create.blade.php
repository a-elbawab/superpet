<x-layout :title="trans('invoices.actions.create')" :breadcrumbs="['dashboard.invoices.create']">
    {{ BsForm::resource('invoices')->post(route('dashboard.invoices.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('invoices.actions.create'))

        @include('dashboard.invoices.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('invoices.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>