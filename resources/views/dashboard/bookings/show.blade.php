<x-layout :title="$booking->id" :breadcrumbs="['dashboard.bookings.show', $booking]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                        <tr>
                            <th width="200">@lang('bookings.attributes.service_id')</th>
                            <td>{{ $booking->serveice?->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('bookings.attributes.inputs')</th>
                            <td>
                                @foreach ($booking->inputs as $key => $input)
                                    <li>
                                        @php($mainInput = \App\Models\Input::where('name', $key)->first())
                                        @if ($mainInput)
                                            <span class="badge badge-primary">{{ $mainInput->label }}
                                            </span>
                                            :
                                            @if (!is_string($input))
                                                @foreach ((array) $input as $value)
                                                    <span class="badge badge-secondary"
                                                        style="margin-right: 5px">{{ $value }}</span>
                                                @endforeach
                                            @else
                                                {{ $input }}
                                            @endif
                                        @else
                                            <span class="badge badge-primary">{{ $key }}</span>
                                        @endif
                                    </li>
                                @endforeach

                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang('bookings.attributes.files')</th>
                            <td>
                                @foreach ($booking->getMedia('files') as $media)
                                    <li>
                                        {{ $media->name }} : 
                                        @if (in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif']))
                                            <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" width="100">
                                        @else
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ $media->name }}
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.bookings.partials.actions.delete')
                    @include('dashboard.bookings.partials.actions.restore')
                    @include('dashboard.bookings.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
