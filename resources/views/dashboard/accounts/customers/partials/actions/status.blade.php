@can('update', $customer)
    <a href="{{ route('dashboard.customers.status', $customer) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($customer->active)
            <i data-feather="check"></i>
        @else
            <i data-feather="x"></i>
        @endif
    </a>
@endcan
