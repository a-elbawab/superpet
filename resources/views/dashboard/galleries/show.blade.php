<x-layout :title="$gallery->name" :breadcrumbs="['dashboard.galleries.show', $gallery]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>

                    @if($gallery->getFirstMedia('image'))
                        <tr>
                            <th width="200">@lang('galleries.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $gallery->getMediaResource('image') }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.galleries.partials.actions.edit')
                    @include('dashboard.galleries.partials.actions.delete')
                    @include('dashboard.galleries.partials.actions.restore')
                    @include('dashboard.galleries.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
