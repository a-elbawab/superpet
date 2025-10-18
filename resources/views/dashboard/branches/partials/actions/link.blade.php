@if($branch)
    @if(method_exists($branch, 'trashed') && $branch->trashed())
        <a href="{{ route('dashboard.branches.trashed.show', $branch) }}" class="text-decoration-none text-ellipsis">
            {{ $branch->name }}
        </a>
    @else
        <a href="{{ route('dashboard.branches.show', $branch) }}" class="text-decoration-none text-ellipsis">
            {{ $branch->name }}
        </a>
    @endif
@else
    ---
@endif