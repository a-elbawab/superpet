@include('dashboard.cities.partials.filter')

@component('dashboard::components.table-box')
    @slot('title', trans('cities.actions.list'))
    @slot('bodyClass', 'p-0')
    <thead>
    <tr>
        <th>@lang('cities.attributes.name')</th>

        <th>...</th>
    </tr>
    </thead>
    <tbody>
    @forelse($cities as $city)
        <tr>
            <td>
            <a href="{{ route('dashboard.countries.cities.show', [$city->country, $city]) }}"
                    class="text-decoration-none text-ellipsis">
                </a>
                {{ $city->name }}
            </td>




            <td>
                @include('dashboard.cities.partials.actions.show')
                @include('dashboard.cities.partials.actions.edit')
                @include('dashboard.cities.partials.actions.delete')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('cities.empty')</td>
        </tr>
    @endforelse

    @if($cities->hasPages())
        @slot('footer')
            {{ $cities->appends(request()->query())->links() }}
        @endslot
    @endif
@endcomponent
