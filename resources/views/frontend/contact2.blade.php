@extends('frontend.layout')
@section('content')
    <section class="hero-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('frontend.navbar.contact')</h2>
                    <div>
                        <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                        /
                        <a href="{{ route('front.contact') }}">@lang('frontend.navbar.contact')</a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

    </section>
    <section class="contact">
        @include('frontend.errors')

        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-12">
                    <section class="p-4 rounded" style="background-color: #f6f2ec; color: #000;">
                        <div class="accordion" id="footerAccordion">
                            <div class="accordion-item border-0" style="background-color: transparent;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button bg-transparent text-dark collapsed px-0 shadow-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#branchesCollapse">
                                        @lang('branches.plural')
                                    </button>
                                </h2>
                                <div id="branchesCollapse" class="accordion-collapse collapse">
                                    <div class="accordion-body px-0">
                                        @foreach(App\Models\Branch::all() as $branch)
                                            <div class="mb-2">
                                                <strong>{{ $branch->name }}</strong><br>
                                                {{ $branch->address }}<br>
                                                📞 {{ $branch->phone }}<br>
                                                @if($branch->location_url)
                                                    <a href="{{ $branch->location_url }}" target="_blank"
                                                        class="text-primary text-decoration-underline">
                                                        @lang('frontend.view_on_map')
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border-0" style="background-color: transparent;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button bg-transparent text-dark px-0 shadow-none" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#policiesCollapse">
                                        @lang('frontend.store_policies')
                                    </button>
                                </h2>
                                <div id="policiesCollapse" class="accordion-collapse collapse show">
                                    <div class="accordion-body px-0">
                                        <ul class="list-unstyled">
                                            <li><a href="{{ route('front.privacy') }}"
                                                    class="text-dark">@lang('frontend.privacy_policy')</a></li>
                                            </li>
                                            <li><a href="{{ route('front.shipping_policy') }}"
                                                    class="text-dark">@lang('frontend.shipping_policy')</a></li>
                                            <li><a href="{{ route('front.return_policy') }}"
                                                    class="text-dark">@lang('frontend.return_policy')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                </div>
            </div>

        </div>
        <div class="text-center mt-4">
            <a href="https://wa.me/{{\Settings::get('whatsapp')}}" target="_blank"
                class="d-inline-flex align-items-center gap-2 text-decoration-none"
                style="background-color: #25D366; color: white; padding: 10px 20px; border-radius: 8px; font-size: 1.1rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="24"
                    height="24" style="margin-right: 8px;">
                {{ __('frontend.contact_whatsapp') }}
            </a>
        </div>

    </section>
@endsection
{{-- @section('scripts')
<script>
    function initMap() {
        const center = { lat: 31.230, lng: 29.960 };

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: center,
        });

        const locale = '{{ app()->getLocale() }}';

        const addressSmouha = (locale === 'ar')
            ? '٧٧ تعاونيات سموحة، أمام خير زمان <br>📞 01115477484'
            : '77 Taawoniat Smouha, in front of Khair Zaman<br>📞 01115477484';

        const marker1 = new google.maps.Marker({
            position: { lat: 31.248632, lng: 29.973443 },
            map: map,
            title: "Super Pet - Smouha"
        });

        const infoWindow1 = new google.maps.InfoWindow({
            content: `<div style="font-size:14px; line-height:1.5">${addressSmouha}</div>`
        });

        marker1.addListener('click', () => {
            infoWindow1.open(map, marker1);
        });

        const addressLoran = (locale === 'ar')
            ? '٢٦ شارع الفريق إسماعيل سرهنك، أمام مترو ماركت - لوران<br>📞 01554365066'
            : '26 Fareeq Ismail Sarhan St., in front of Metro Market - Loran<br>📞 01554365066';

        const marker2 = new google.maps.Marker({
            position: { lat: 31.209834, lng: 29.950532 },
            map: map,
            title: "Super Pet - Loran"
        });

        const infoWindow2 = new google.maps.InfoWindow({
            content: `<div style="font-size:14px; line-height:1.5">${addressLoran}</div>`
        });

        marker2.addListener('click', () => {
            infoWindow2.open(map, marker2);
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxSE2Erzht07SH0NNVaSL0NbUAry7KZcY&callback=initMap" async
    defer></script>
@endsection --}}