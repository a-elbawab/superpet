<x-layout :title="$branch->name" :breadcrumbs="['dashboard.branches.show', $branch]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('branches.attributes.name')</th>
                        <td>{{ $branch->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('branches.attributes.phone')</th>
                        <td>{{ $branch->phone }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('branches.attributes.address')</th>
                        <td>{{ $branch->address }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('branches.attributes.location_url')</th>
                        <td><a href="{{ $branch->location_url }}" target="_blank">location</a></td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.branches.partials.actions.edit')
                    @include('dashboard.branches.partials.actions.delete')
                    @include('dashboard.branches.partials.actions.restore')
                    @include('dashboard.branches.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
