<button type="submit" class="btn btn-default btn-sm"
        data-checkbox=".item-checkbox"
        data-form="read-selected-form"
        form="read-selected-form">
    <i class="fa fa-eye"></i>
    @lang('feedback.actions.read')
</button>
<button type="submit" class="btn btn-default btn-sm"
        data-checkbox=".item-checkbox"
        data-form="unread-selected-form"
        form="unread-selected-form">
    <i data-feather="eye-off"></i>
    @lang('feedback.actions.unread')
</button>
{{ BsForm::patch(route('dashboard.feedback.read'), ['id' => 'read-selected-form', 'class' => 'd-none']) }}
{{ BsForm::close() }}
{{ BsForm::patch(route('dashboard.feedback.unread'), ['id' => 'unread-selected-form', 'class' => 'd-none']) }}
{{ BsForm::close() }}
