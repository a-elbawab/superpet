<x-layout :title="trans('settings.tabs.contacts')" :breadcrumbs="['dashboard.settings.index']">
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    @component('dashboard::components.box')

        {{ BsForm::text('email')->value(Settings::get('email')) }}
        {{ BsForm::text('phone')->value(Settings::get('phone')) }}
        {{ BsForm::text('address')->value(Settings::get('address')) }}
        {{ BsForm::text('address2')->value(Settings::get('address2')) }}
        {{ BsForm::text('whatsapp')->value(Settings::get('whatsapp')) }}
        {{ BsForm::text('facebook')->value(Settings::get('facebook')) }}
        {{ BsForm::text('twitter')->value(Settings::get('twitter')) }}
        {{ BsForm::text('instagram')->value(Settings::get('instagram')) }}
        {{ BsForm::text('snapchat')->value(Settings::get('snapchat')) }}

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
