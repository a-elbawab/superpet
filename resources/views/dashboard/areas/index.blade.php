@include('dashboard.areas.partials.filter')

@component('dashboard::components.table-box')
    @slot('title', trans('areas.actions.list'))
    @slot('bodyClass', 'p-0')
    <thead>
        <tr>
            <th>@lang('areas.attributes.name')</th>
            <th>@lang('areas.attributes.shipping_price')</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody id="sortable-areas-body">
        @forelse($areas as $area)
            <tr data-id="{{ $area->id }}">
                <td>{{ $area->name }}</td>
                <td>{{ $area->shipping_price }}</td>
                <td>
                    @include('dashboard.areas.partials.actions.edit')
                    @include('dashboard.areas.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('areas.empty')</td>
            </tr>
        @endforelse


    @if($areas->hasPages())
        @slot('footer')
            {{ $areas->appends(request()->query())->links() }}
        @endslot
    @endif
@endcomponent


@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#sortable-areas-body").sortable({
                update: function (event, ui) {
                    let order = [];

                    $('#sortable-areas-body tr').each(function (index) {
                        order.push({
                            id: $(this).data('id'),
                            position: index + 1
                        });
                    });

                    $.ajax({
                        url: '{{ route('dashboard.areas.sort') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            order: order
                        },
                        success: function (response) {
                            console.log('Order updated');
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            }).disableSelection();
        });
    </script>
@endpush