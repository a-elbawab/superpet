<x-layout :title="$input->name" :breadcrumbs="['dashboard.inputs.show', $input]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('inputs.attributes.name')</th>
                            <td>{{ $input->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('inputs.attributes.section_id')</th>
                            <td><a href="{{ route('dashboard.sections.show', $input->section) }}">{{ $input->section->name }}</a></td>
                        </tr>
                        <tr>
                            <th width="200">@lang('inputs.attributes.type')</th>
                            <td>{{ $input->type }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('inputs.attributes.required')</th>
                            <td>{{ $input->required ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('inputs.attributes.order')</th>
                            <td>{{ $input->order }}</td>
                        </tr>

                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.inputs.partials.actions.edit')
                    @include('dashboard.inputs.partials.actions.delete')
                    @include('dashboard.inputs.partials.actions.restore')
                    @include('dashboard.inputs.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
    @if (in_array($input->type, ['radio', 'checkbox', 'select']))
        @include('dashboard.options.index')
    @endif
</x-layout>
