{{ BsForm::resource('pages')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('pages.filter'))

    <div class="row">
        <div class="col-md-4">
            {{ BsForm::text('title')->value(request('title')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::text('content')->value(request('content')) }}
        </div>
        <div class="col-md-4">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                 ->label(trans('pages.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i data-feather="search"></i>
            @lang('pages.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
