@if($invoice)
    @if(method_exists($invoice, 'trashed') && $invoice->trashed())
        <a href="{{ route('dashboard.invoices.trashed.show', $invoice) }}" class="text-decoration-none text-ellipsis">
            {{ $invoice->name }}
        </a>
    @else
        <a href="{{ route('dashboard.invoices.show', $invoice) }}" class="text-decoration-none text-ellipsis">
            {{ $invoice->name }}
        </a>
    @endif
@else
    ---
@endif