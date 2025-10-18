@include('dashboard.errors')

{{ BsForm::text('name') }}
{{ BsForm::text('email') }}

<div class="row">
    <phone value="{{ old('phone', isset($customer) ? $customer->phone : '') }}"
           code="{{ old('phone_code', isset($customer) ? $customer->phone_code : '') }}"></phone>
</div>

{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

@isset($customer)
    {{ BsForm::image('avatar')->collection('avatars')->files($customer->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset
