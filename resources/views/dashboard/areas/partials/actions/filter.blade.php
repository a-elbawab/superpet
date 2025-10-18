<button
    type="button"
   id="filter-popover"
   class="btn btn-outline-dark btn-sm">
    <i data-feather="search"></i>
</button>

<div id="popover-content" class="d-none">
    {{ BsForm::resource('areas')->get(null) }}
        {{ BsForm::text('name')->value(request('name')) }}
        {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('areas.perPage')) }}

        <button type='submit' class='btn btn-primary btn-sm'>
            <i data-feather="search"></i>
            @lang('areas.actions.filter')
        </button>

    {{ BsForm::close() }}
</div>

@push('scripts')
    <script>
        $('#filter-popover').popover({
            html: true,
            container: 'body',
            content: function () {
                return $("#popover-content").html();
            },
            placement: 'bottom',
            sanitize: false,
        });
    </script>
@endpush
