@can('view', $feedback)
    <a href="{{ route('dashboard.feedback.show', $feedback) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
