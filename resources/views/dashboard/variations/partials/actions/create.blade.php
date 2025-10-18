@can('create', \App\Models\Variation::class)
    <a href="{{ route('dashboard.variations.create', ['attribute' => $attribute]) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('variations.actions.create')
    </a>
@endcan
