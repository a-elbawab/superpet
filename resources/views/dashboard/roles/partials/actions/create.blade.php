@can('create', \App\Models\Role::class)
    <a href="{{ route('dashboard.roles.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fa fa-plus"></i>
        @lang('roles.actions.create')
    </a>
@endcan
