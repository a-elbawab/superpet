@include('dashboard.errors')

{{ BsForm::text('name') }}
{{ BsForm::text('email') }}

<div class="row">
    <phone value="{{ old('phone', isset($supervisor) ? $supervisor->phone : '') }}"
           code="{{ old('phone_code', isset($supervisor) ? $supervisor->phone_code : '') }}"></phone>
</div>

{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

@if(auth()->user()->isAdmin())
    <select2
        placeholder="@lang('roles.singular')"
        name="role"
        id="role"
        value="{{ $supervisor->roles->count() ? $supervisor->roles->first()->id : null }}"
        label="@lang('roles.singular')"
        remote-url="{{ route('api.roles.select') }}"
    ></select2>
@endif

@isset($supervisor)
    {{ BsForm::image('avatar')->collection('avatars')->files($supervisor->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset
