    @include('dashboard.inputs.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('inputs.actions.list') ({{ $inputs->total() }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <div class="d-flex">
                        <x-check-all-delete type="{{ \App\Models\Input::class }}" :resource="trans('inputs.plural')"></x-check-all-delete>

                        <div class="ml-2 d-flex justify-content-between flex-grow-1">
                            @include('dashboard.inputs.partials.actions.create')
                            @include('dashboard.inputs.partials.actions.trashed')
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="width: 30px;" class="text-center">
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('inputs.attributes.name')</th>
                <th>@lang('inputs.attributes.type')</th>
                <th>@lang('inputs.attributes.order')</th>
                <th>@lang('inputs.attributes.required')</th>
                <th style="width: 160px">...</th>
            </tr>

        </thead>
        <tbody>
            @forelse($inputs as $input)
                <tr>
                    <td class="text-center">
                        <x-check-all-item :model="$input"></x-check-all-item>
                    </td>
                    <td>
                        <a href="{{ route('dashboard.inputs.show', $input) }}" class="text-decoration-none text-ellipsis">
                            {{ $input->name }}
                        </a>
                    </td>

                    <td>
                        {{ $input->type }}
                    </td>
                    <td>
                        {{ $input->order }}
                    </td>

                    <td>
                        {{ trans('inputs.required.' . $input->required) }}
                    </td>

                    <td style="width: 160px">
                        @include('dashboard.inputs.partials.actions.show')
                        @include('dashboard.inputs.partials.actions.edit')
                        @include('dashboard.inputs.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('inputs.empty')</td>
                </tr>
            @endforelse

            @if ($inputs->hasPages())
                @slot('footer')
                    {{ $inputs->appends(request()->query())->links() }}
                @endslot
            @endif
        @endcomponent
