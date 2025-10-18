<button class="btn btn-outline-warning btn-sm ml-2"
        data-checkbox=".item-checkbox"
        data-form="attend-selected-form"
        data-toggle="modal"
        data-target="#attend-selected-model">
    <i class="fas fa-user-edit"></i>
    @lang('check-all.actions.attend')
</button>

<!-- Modal -->
<div class="modal fade" id="attend-selected-model" tabindex="-1" role="dialog"
     aria-labelledby="selected-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selected-modal-title">
                    @lang('check-all.dialogs.attend.title')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('check-all.dialogs.attend.info', ['type' => $resource ?? ''])
                <form action="{{ route('dashboard.attend.selected') }}"
                      id="attend-selected-form"
                      method="post">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="type" value="{{ $type ?? '' }}">
                    <input type="hidden" name="resource" value="{{ $resource ?? '' }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    @lang('check-all.dialogs.attend.cancel')
                </button>
                <button type="submit" class="btn btn-primary btn-sm" form="attend-selected-form">
                    @lang('check-all.dialogs.attend.confirm')
                </button>
            </div>
        </div>
    </div>
</div>
