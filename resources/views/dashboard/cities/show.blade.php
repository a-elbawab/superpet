<x-layout :title="$city->name" :breadcrumbs="['dashboard.countries.show', $city->country]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('cities.attributes.name')</th>
                        <td>{{ $city->name }}</td>
                    </tr>
                    </tbody>
                </table>
                @slot('footer')
                    @include('dashboard.cities.partials.actions.edit')
                    @include('dashboard.cities.partials.actions.delete')
                @endslot
            @endcomponent

            @include('dashboard.areas.create', ['cityId' => $city->id])
        </div>
        <div class="col-md-6">
            @include('dashboard.areas.index')
        </div>
    </div>
</x-layout>
