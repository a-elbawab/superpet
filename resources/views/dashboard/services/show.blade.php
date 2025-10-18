<x-layout :title="$service->name" :breadcrumbs="['dashboard.services.show', $service]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('services.attributes.name')</th>
                            <td>{{ $service->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('services.attributes.order')</th>
                            <td>{{ $service->order }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('services.attributes.home')</th>
                            <td>{{ $service->home ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('services.attributes.description')</th>
                            <td>{!! $service->description !!}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('services.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $service->getMediaResource('image') }}"></file-preview>
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang('services.attributes.home_icon')</th>
                            <td>
                                <file-preview :media="{{ $service->getMediaResource('home_icon') }}"></file-preview>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.services.partials.actions.edit')
                    @include('dashboard.services.partials.actions.delete')
                    @include('dashboard.services.partials.actions.restore')
                    @include('dashboard.services.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
    @include('dashboard.sections.index')
</x-layout>
