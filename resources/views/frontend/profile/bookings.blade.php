@extends('frontend.layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">@lang('bookings.plural')</h2>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>@lang('bookings.plural')</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('bookings.attributes.service_id')</th>
                            <th>@lang('bookings.attributes.inputs')</th>
                            <th>@lang('bookings.attributes.files')</th>
                            <th>@lang('bookings.attributes.created_at')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->serveice?->name }}</td>
                            <td>
                                @foreach ($booking->inputs as $key => $input)
                                @php($mainInput = \App\Models\Input::where('name', $key)->first())
                                @if ($mainInput)
                                    <strong>{{ $mainInput->label }}</strong>:
                                @else
                                    <strong>{{ $key }}</strong>:
                                @endif
                                @if (!is_string($input))
                                    @foreach ((array) $input as $value)
                                        <span class="badge bg-secondary">{{ $value }}</span>
                                    @endforeach
                                @else
                                    {{ $input }}
                                @endif
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($booking->getMedia('files') as $media)
                                    @if (in_array($media->mime_type, ['image/jpeg', 'image/png', 'image/gif']))
                                        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" width="60">
                                    @else
                                        <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }}</a>
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                            <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">@lang('bookings.no_bookings')</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection