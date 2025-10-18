<x-layout :title="trans('settings.tabs.main')" :breadcrumbs="['dashboard.settings.index']">
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    @component('dashboard::components.box')

        @bsMultilangualFormTabs

        {{ BsForm::text('name')->value(Settings::locale($locale->code)->get('name')) }}
        {{ BsForm::text('slogan')->value(Settings::locale($locale->code)->get('slogan')) }}

        {{ BsForm::text('copyright')->value(Settings::locale($locale->code)->get('copyright')) }}

        @endBsMultilangualFormTabs

        <select2
            placeholder="@lang('pages.filter')"
            name="terms"
            id="terms"
            value="{{Settings::get('terms')}}"
            label="@lang('settings.attributes.terms')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
            placeholder="@lang('pages.filter')"
            name="privacy"
            id="privacy"
            value="{{Settings::get('privacy')}}"
            label="@lang('settings.attributes.privacy')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
            placeholder="@lang('pages.filter')"
            name="shipping_policy"
            id="shipping_policy"
            value="{{Settings::get('shipping_policy')}}"
            label="@lang('settings.attributes.shipping_policy')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
            placeholder="@lang('pages.filter')"
            name="return_policy"
            id="return_policy"
            value="{{Settings::get('return_policy')}}"
            label="@lang('settings.attributes.return_policy')"
            remote-url="{{ route('api.pages.select') }}"
        ></select2>

        </div>

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
