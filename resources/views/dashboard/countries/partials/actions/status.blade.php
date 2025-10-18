@can('update', $country)
    <a href="{{ route('dashboard.countries.status', $country) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($country->active)
            <i data-feather="check"></i>
        @else
            <i data-feather="x"></i>
        @endif
    </a>
@endcan
