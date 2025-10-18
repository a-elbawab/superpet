<x-layout :title="$slider->name" :breadcrumbs="['dashboard.sliders.show', $slider]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('sliders.attributes.paragraph')</th>
                        <td>{{ $slider->paragraph }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('sliders.attributes.paragraph2')</th>
                        <td>{{ $slider->paragraph2 }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('sliders.attributes.image')</th>
                        <td>
                            <file-preview :media="{{ $slider->getMediaResource('image') }}"></file-preview>
                        </td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.sliders.partials.actions.edit')
                    @include('dashboard.sliders.partials.actions.delete')
                    @include('dashboard.sliders.partials.actions.restore')
                    @include('dashboard.sliders.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
