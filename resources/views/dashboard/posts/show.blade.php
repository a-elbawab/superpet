<x-layout :title="$post->name" :breadcrumbs="['dashboard.posts.show', $post]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('posts.attributes.name')</th>
                        <td>{{ $post->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('posts.attributes.paragraph')</th>
                        <td>{!! $post->paragraph !!}</td>
                    </tr>
                    @if($post->getFirstMedia())
                        <tr>
                            <th width="200">@lang('posts.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $post->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.posts.partials.actions.edit')
                    @include('dashboard.posts.partials.actions.delete')
                    @include('dashboard.posts.partials.actions.restore')
                    @include('dashboard.posts.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
