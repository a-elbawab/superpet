@if($input)
    @if(method_exists($input, 'trashed') && $input->trashed())
        <a href="{{ route('dashboard.inputs.trashed.show', $input) }}" class="text-decoration-none text-ellipsis">
            {{ $input->name }}
        </a>
    @else
        <a href="{{ route('dashboard.inputs.show', $input) }}" class="text-decoration-none text-ellipsis">
            {{ $input->name }}
        </a>
    @endif
@else
    ---
@endif