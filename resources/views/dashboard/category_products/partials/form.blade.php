@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@include('dashboard.errors')
@if (!isset($category_product))
    <input type="hidden" name="product_id" value="{{ request('product_id') }}">
@else
    <input type="hidden" name="product_id" value="{{ $category_product->product_id }}">
@endif
{{ BsForm::select('category_id')->options($categories)->attribute(['class' => 'form-control select2']) }}
{{ BsForm::select('sub_category_id')->options(isset($subCategories) ? $subCategories : []) }}
{{ BsForm::select('sub_category_id2')->options(isset($subCategories2) ? $subCategories2 : []) }}


@push('scripts')
    <script>
        $('#category_id').select2();

        $('#category_id').on('change', function () {

            var category_id = $('#category_id').val();

            $('#sub_category_id').empty();

            $.ajax({
                url: `{{ route('dashboard.categories.getSubCategories') }}?category_id=${category_id}`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    $('#sub_category_id').append("<option value=''>Select Sub Category</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#sub_category_id').append("<option value='" + id + "'>" + name +
                            "</option>");
                    }
                }
            });
        });

        $('#sub_category_id').on('change', function () {

            var category_id = $('#sub_category_id').val();

            $('#sub_category_id2').empty();

            $.ajax({
                url: `{{ route('dashboard.categories.getSubCategories') }}?category_id=${category_id}`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    $('#sub_category_id2').append("<option value=''>Select Sub Category</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $('#sub_category_id2').append("<option value='" + id + "'>" + name +
                            "</option>");
                    }
                }
            });
        });
    </script>
    {{-- if is parent --}}
    <script>
        $('#parent').on('change', function () {
            if ($(this).val() == 1 || $(this).val() == '') {
                $('#child').hide();
            } else {
                $('#child').show();
            }
        });
        $(document).ready(function () {
            if ($('#parent').val() == 0 || $('#parent').val() == '') {
                $('#child').hide();
            } else {
                $('#child').show();
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                tags: true,
                placeholder: "Select or add a tag",
                allowClear: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endpush