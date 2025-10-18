<x-layout :title="trans('posts.trashed')" :breadcrumbs="['dashboard.posts.trashed']">
    @include('dashboard.posts.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('posts.actions.list') ({{ $posts->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <x-check-all-force-delete
                      type="{{ \App\Models\Post::class }}"
                      :resource="trans('posts.plural')"></x-check-all-force-delete>
              <x-check-all-restore
                      type="{{ \App\Models\Post::class }}"
                      :resource="trans('posts.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('posts.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$post"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.posts.trashed.show', $post) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $post->getFirstMediaUrl() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $post->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.posts.partials.actions.show')
                    @include('dashboard.posts.partials.actions.restore')
                    @include('dashboard.posts.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('posts.empty')</td>
            </tr>
        @endforelse

        @if($posts->hasPages())
            @slot('footer')
                {{ $posts->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
