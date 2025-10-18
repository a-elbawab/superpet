@can('update', $hint)
        <a href="{{ route('dashboard.hints.done', $hint) }}"
        title="{{ $hint->done ? trans('hints.actions.undone') : trans('hints.actions.done') }}"
         class="btn @if(!$hint->done) btn-success @else btn-danger @endif  btn-sm">
            <i class="fas fa fa-fw fa-check"></i>
        </a>
    @endcan
