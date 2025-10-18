@can('update', [$city, $city->country])
    <a href="{{ route('dashboard.countries.cities.edit', [$city->country, $city]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endcan
