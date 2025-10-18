<x-layout :title="$section->name" :breadcrumbs="['dashboard.sections.show', $section]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('sections.attributes.name')</th>
                        <td>{{ $section->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('services.singular')</th>
                        <td><a href="{{ route('dashboard.services.show', $section->service) }}">{{ $section->service->name }}</a></td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.sections.partials.actions.edit')
                    @include('dashboard.sections.partials.actions.delete')
                    @include('dashboard.sections.partials.actions.restore')
                    @include('dashboard.sections.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
    @include('dashboard.inputs.index')
</x-layout>
