<x-layout :title="trans('posts.plural')" :breadcrumbs="['dashboard.posts.index']">
    @include('dashboard.posts.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('posts.actions.list') ({{ $posts->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <div class="d-flex">
                  <x-check-all-delete
                          type="{{ \App\Models\Post::class }}"
                          :resource="trans('posts.plural')"></x-check-all-delete>

                  <div class="ml-2 d-flex justify-content-between flex-grow-1">
                      @include('dashboard.posts.partials.actions.create')
                      @include('dashboard.posts.partials.actions.trashed')
                  </div>
              </div>
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
                    <a href="{{ route('dashboard.posts.show', $post) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $post->getFirstMediaUrl() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $post->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.posts.partials.actions.show')
                    @include('dashboard.posts.partials.actions.edit')
                    @include('dashboard.posts.partials.actions.delete')
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
