@can('view', [$country, $city])
    <a href="{{ route('dashboard.countries.cities.show', [$country, $city]) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
