    @include('dashboard.options.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('options.actions.list') ({{ $options->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Option::class }}"
                        :resource="trans('options.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.options.partials.actions.create')
                    @include('dashboard.options.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('options.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($options as $option)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$option"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.options.show', $option) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $option->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.options.partials.actions.show')
                    @include('dashboard.options.partials.actions.edit')
                    @include('dashboard.options.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('options.empty')</td>
            </tr>
        @endforelse

        @if($options->hasPages())
            @slot('footer')
                {{ $options->appends(request()->query())->links() }}
            @endslot
        @endif
    @endcomponent
