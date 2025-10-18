@can('create', \App\Models\Gallery::class)
    <a href="{{ route('dashboard.galleries.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('galleries.actions.create')
    </a>
@endcan
