<x-layout :title="$option->name" :breadcrumbs="['dashboard.options.show', $option]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('options.attributes.name')</th>
                        <td>{{ $option->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('options.attributes.value')</th>
                        <td>{{ $option->value }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('options.attributes.input_id')</th>
                        <td><a href="{{ route('dashboard.inputs.show', $option->input) }}">{{ $option->input->name }}</td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.options.partials.actions.edit')
                    @include('dashboard.options.partials.actions.delete')
                    @include('dashboard.options.partials.actions.restore')
                    @include('dashboard.options.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
