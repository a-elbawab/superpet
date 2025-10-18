@can('create', \App\Models\Tag::class)
    <a href="{{ route('dashboard.tags.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('tags.actions.create')
    </a>
@endcan
