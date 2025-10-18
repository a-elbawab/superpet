<button type="button"
        class="btn btn-danger btn-sm"
        data-toggle="modal"
        data-target="#notifications-delete-model-{{ $notification->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade"
     id="notifications-delete-model-{{ $notification->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('notifications.dialogs.delete.title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('notifications.dialogs.delete.info')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('notifications.dialogs.delete.cancel')
                </button>
                <button type="submit" form="notifications-delete-form-{{ $notification->id }}" class="btn btn-danger">
                    @lang('notifications.dialogs.delete.confirm')
                </button>
                {{ BsForm::delete(route('dashboard.notifications.destroy', $notification), [
                    'id' => 'notifications-delete-form-'.$notification->id,
                ]) }}
                {{ BsForm::close() }}
            </div>
        </div>
    </div>
</div>


