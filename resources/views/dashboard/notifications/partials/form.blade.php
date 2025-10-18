<div class="row">
    <div class="col-md-6">
        <p class="mb-4 font-weight-bold">@lang('notifications.title')</p>
        <hr>
        {{ BsForm::text('title')->required() }}
        {{ BsForm::textarea('body')->rows(5)->required() }}
        <select2
                placeholder="@lang('notifications.choose')"
                name="page_id"
                id="page_id"
                label="@lang('notifications.attributes.page_id')"
                remote-url="{{ route('api.pages.select') }}"
        ></select2>
        <select2
                placeholder="@lang('offers.choose')"
                name="offer_id"
                id="offer_id"
                label="@lang('notifications.attributes.offer_id')"
                remote-url="{{ route('api.offers.select') }}"
        ></select2>

    </div>
    <div class="col-md-6">
        <p class="mb-4 font-weight-bold">@lang('notifications.notifiables')</p>
        <hr>
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">@lang('notifications.attributes.customers')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">@lang('notifications.attributes.owners')</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <!-- customers -->
                    <div class="form-check">
                        <input type="checkbox" name="check_all_cities_customers"
                                class="check_all_cities_customers form-check-input" id="check_all_cities_customers">
                        <label class="form-check-label" for="exampleCheck1">@lang('notifications.check_all')</label>
                    </div>
                    <div id="customers_city">
                        <select2
                                name="customers_city_id"
                                id="customers_city_id"
                                class="customers_city_id"
                                multiple="true"
                                label="@lang('notifications.attributes.cities_customers')"
                                remote-url="{{ route('api.cities.select') }}"
                        ></select2>
                    </div>
                    <select2
                            name="customers_notifiables[]"
                            id="customers"
                            multiple="true"
                            label="@lang('notifications.attributes.customers')"
                            remote-url="{{ route('api.customers.select') }}"
                    ></select2>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <!-- owners -->
                    <div class="form-check">
                        <input type="checkbox" name="check_all_cities_owners"
                                class="check_all_cities_owners form-check-input" id="check_all_cities_owners">
                        <label class="form-check-label" for="exampleCheck1">@lang('notifications.check_all')</label>
                    </div>
                    <div id="owners_city">
                        <select2
                                name="owners_city_id"
                                id="owners_city_id"
                                class="owners_city_id"
                                multiple="true"
                                label="@lang('notifications.attributes.cities_owners')"
                                remote-url="{{ route('api.cities.select') }}"
                        ></select2>
                    </div>
                    <select2
                            name="owners_notifiables[]"
                            id="owners"
                            multiple="true"
                            label="@lang('notifications.attributes.owners')"
                            remote-url="{{ route('api.owners.select') }}"
                    ></select2>
                </div>
            </div>
        </div>
    </div>
</div>


@prepend('scripts')
<script>
    $(document).ready(function () {
        /** Choose teacher or page */
        $('select[name=page_id]').change(function () {
            $('#teacher_id').addClass("disabledbutton");
        });
        $('select[name=teacher_id]').change(function () {
            $('#page_id').addClass("disabledbutton");
        });
        /** End choosing teacher of page */

        /** customers */
        $('#check_all_cities_customers').click(function () {
            if ($(this).is(":checked")) {
                $('#customers_city').addClass("disabledbutton");
                $.ajax({
                    url: '{{route('api.clearOptions.select')}}',
                    data: {
                        customers_city_id: $(this).val()
                    },
                });
            } else {
                $('#customers_city').removeClass("disabledbutton");
            }
        });
        // Get customers related to the chosen city
        $('select[name=customers_city_id]').change(function () {
            $.ajax({
                url: '{{route('api.saveOptions.select')}}',
                data: {
                    customers_city_id: $(this).val()
                },
            });
        });
        /** End customers */

        // owners
        $('#check_all_cities_owners').click(function () {
            if ($(this).is(":checked")) {
                $('#owners_city').addClass("disabledbutton");
                $.ajax({
                    url: '{{route('api.clearOptions.select')}}',
                    data: {
                        owners_city_id: $(this).val()
                    },
                });
            } else {
                $('#owners_city').removeClass("disabledbutton");
            }
        });

        /** Get related to the chosen city  */
        $('select[name=owners_city_id]').change(function () {
            $.ajax({
                url: '{{route('api.saveOptions.select')}}',
                data: {
                    owners_city_id: $(this).val()
                },
            });
        });

    });
</script>
@endprepend
