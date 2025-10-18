@include('dashboard.errors')

{{ BsForm::text('name') }}
{{ BsForm::email('email') }}

{{ BsForm::text('phone') }}

{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

@isset($admin)
    {{ BsForm::image('avatar')->collection('avatars')->files($admin->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset
