@can('delete', $country)
    <a href="#user-{{ $country->id }}-delete-model"
       class="btn btn-outline-danger btn-sm"
       data-toggle="modal">
        <i data-feather="trash"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="user-{{ $country->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $country->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $country->id }}">@lang('countries.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('countries.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.countries.destroy', $country)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('countries.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('countries.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan
