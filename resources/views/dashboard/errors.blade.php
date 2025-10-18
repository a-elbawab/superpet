@php($errorBag = $errorBag ?? 'default')
@if ($errors->{$errorBag}->any())
    <div class="alert alert-danger">
        <div class="alert-body">
            <ul class="m-0">
                @foreach ($errors->{$errorBag}->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
