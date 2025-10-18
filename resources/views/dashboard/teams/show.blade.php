<x-layout :title="$team->name" :breadcrumbs="['dashboard.teams.show', $team]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('teams.attributes.name')</th>
                        <td>{{ $team->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('teams.attributes.title')</th>
                        <td>{{ $team->title }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('teams.attributes.image')</th>
                        <td>
                            <file-preview :media="{{ $team->getMediaResource('image') }}"></file-preview>
                        </td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.teams.partials.actions.edit')
                    @include('dashboard.teams.partials.actions.delete')
                    @include('dashboard.teams.partials.actions.restore')
                    @include('dashboard.teams.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
