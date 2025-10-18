@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name')->required() }}
{{ BsForm::textarea('description')->rows(rows: 2)->required() }}

{{ BsForm::text('meta_keywords')->placeholder('Comma, separated, keywords') }}
{{ BsForm::textarea('meta_description')->rows(rows: 2)->placeholder('Meta description') }}
@endBsMultilangualFormTabs

{{ BsForm::text('code') }}

@if (!isset($product) && !isset($parent))
    {{ BsForm::select('parent')->options(trans('products.parent')) }}
@else
    <input type="hidden" name="parent_id" id="parent_id" value="{{ $parent?->id }}">
    <input type="hidden" name="parent" id="parent" value="{{ $parent ? 1 : 0 }}">
@endif


<div id="child" style="display: none">
    {{ BsForm::number('stock') }}
    {{ BsForm::number('price')->step('0.01') }}
    {{ BsForm::number('old_price')->step('0.01') }}
    {{ BsForm::select('best_seller')->options(trans('products.best_seller')) }}
</div>

{{ BsForm::select('category_id')->options($categories)->attribute(['class' => 'form-control select2', 'required' => 'required']) }}
{{ BsForm::select('sub_category_id')->options(isset($subCategories) ? $subCategories : [])->attribute(['required' => 'required']) }}
{{ BsForm::select('sub_category_id2')->options(isset($subCategories2) ? $subCategories2 : []) }}

{{ BsForm::select('active')->options(trans('products.active')) }}

<select2 label="@lang('tags.plural')" value="{{ isset($product) ? $product->tags()->pluck('tags.id')->toJson() : '' }}"
    placeholder="@lang('tags.plural')" id="tags" name="tags[]" multiple="multiple"
    remote-url="{{ route('api.tags.select') }}"></select2>


@isset($product)
    {{ BsForm::image('main_image[]')->collection('main_image')->files($product->getMediaResource('main_image')) }}
    <p>width: 725 px * height: 967 px </p>
    {{ BsForm::image('images[]')->collection('images')->files($product->getMediaResource('images'))->max(5) }}
@else
    {{ BsForm::image('main_image[]')->collection('main_image') }}
    <p>width: 725 px * height: 967 px </p>
    {{ BsForm::image('images[]')->collection('images')->max(5) }}
@endisset

<div id="combinations-preview" class="alert alert-light border p-2 mb-3" style="display: none;"></div>

<div id="attributes" style="display: none">

    <th>@lang('products.attributes.variations')</th>
    {{-- اختيار الخصائص (Attributes) --}}
    <div class="mb-4">
        <label for="selected_attributes">@lang('products.select_attributes')</label>
        <select multiple class="form-control select2" name="selected_attributes[]" id="selected_attributes">
            @foreach ($attributes as $attribute)
                <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="combinations_json" id="combinations_json">

    {{-- اختيار القيم لكل خاصية --}}
    <div id="attribute-values-container" class="mb-4"></div>

    {{-- جدول التركيبات (combinations) --}}
    <div class="mt-4">
        <h5>@lang('products.attribute_combinations')</h5>
        <table class="table table-bordered" id="combinations-table">
            <thead>
                <tr>
                    <th>@lang('products.combination')</th>
                    <th>@lang('products.price')</th>
                    <th>@lang('products.stock')</th>
                    <th>@lang('products.image')</th>
                </tr>
            </thead>
            <tbody>
                @foreach (isset($product) ? $product->variations : [] as $i => $variation)
                    <tr class="variation-row" data-variation-id="{{ $variation->id }}">
                        <td>
                            @foreach ($variation->combinationDetails() as $v)
                                <input type="hidden" name="combinations[{{ $i }}][value_ids][]" value="{{ $v->id }}">
                                <span class="product-variation-badge">{{ $v->attribute->name }}: {{ $v->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <input type="number" name="combinations[{{ $i }}][price]"
                                value="{{ $variation->price_override }}" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="combinations[{{ $i }}][stock]" value="{{ $variation->quantity }}"
                                class="form-control">
                        </td>
                        <td>
                            <input type="file" name="combinations[{{ $i }}][image]" class="form-control" accept="image/*">
                            @if ($variation->hasMedia('image'))
                                <div class="mt-2 variant-image-wrapper">
                                    <img src="{{ $variation->getFirstMediaUrl('image') }}" width="60" class="img-thumbnail">
                                    <input type="hidden" name="combinations[{{ $i }}][existing_media_id]"
                                        value="{{ $variation->getFirstMedia('image')->id }}">
                                    <button type="button" class="btn btn-sm btn-danger remove-image-btn mt-1"
                                        data-index="{{ $i }}">&times;</button>
                                </div>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-variation">🗑️</button>
                        </td>
                    </tr>
                @endforeach


                <!-- will be filled by JS -->
            </tbody>
        </table>
    </div>

</div>
@php
if (isset($product)) {
    $existingCombinations = $product->variations->map(function ($variation) {
        return [
            'combination' => $variation->combination,
            'price' => $variation->price_override,
            'stock' => $variation->quantity,
            'image_url' => $variation->getFirstMediaUrl('image'),
        ];
    });
} else {
    $existingCombinations = [];
}
@endphp

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        const existingCombinations = @json($existingCombinations);
    </script>
    <script>
        $(document).on('change', 'input[type="file"]', function () {
            const input = this;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const $td = $(input).closest('td');

                    // 🧽 امسح أي صور قديمة وزر X
                    $td.find('img').remove();
                    $td.find('.remove-preview-btn').remove();
                    $td.find('.variant-image-wrapper').remove(); // 💥 هذا هو المطلوب لحذف الصورة القديمة بالكامل (مع الزر)
                    $td.find('input[type="hidden"][name*="[existing_media_id]"]').remove();

                    // ✅ أضف الصورة الجديدة للعرض
                    const $previewWrapper = $(`
            <div class="image-preview-wrapper mt-2" style="position: relative; display: inline-block;">
                <img src="${e.target.result}" class="img-thumbnail" width="60">
                <button type="button" class="btn btn-sm btn-danger remove-preview-btn" style="position: absolute; top: -8px; right: -8px; padding: 2px 6px; font-size: 12px;">&times;</button>
            </div>
        `);
                    $td.append($previewWrapper);
                };


                reader.readAsDataURL(input.files[0]);
            }
        });
        $(document).on('click', '.remove-preview-btn', function () {
            const $td = $(this).closest('td');
            $td.find('.image-preview-wrapper').remove();
            $td.find('input[type="file"]').val('');

            // حدد اسم الـ input للبحث عن الـ index
            const nameAttr = $td.find('input[type="file"]').attr('name');
            const match = nameAttr.match(/\[(\d+)\]/); // يستخرج الرقم بين القوسين مثل [3]
            if (match) {
                const index = match[1];
                // امسح أي موجود سابقًا
                $td.find(`input[name="combinations[${index}][remove_image]"]`).remove();
                // أضف الـ input
                if ($td.find('input[name="combinations[' + index + '][existing_media_id]"]').length) {
                    $td.append(`<input type="hidden" name="combinations[${index}][remove_image]" value="1">`);
                }
            }
        });

    </script>
    <script>
        const isEdit = document.body.classList.contains('product-edit');
        const getVariationsUrl = "{{ route('dashboard.variations.byAttribute') }}";
        const getSubCategoriesUrl = "{{ route('dashboard.categories.getSubCategories') }}";

        $(document).on('change', '#selected_attributes', function () {
            const selectedAttributeIds = $(this).val();
            $('#attribute-values-container').empty();

            if (!selectedAttributeIds.length) return;

            selectedAttributeIds.forEach(attributeId => {
                $.get(`${getVariationsUrl}?attribute_id=${attributeId}`, function (data) {
                    let html = `
                                                                                                                                                                                        <div class="mb-3">
                                                                                                                                                                                            <label>${data[0]?.attribute?.name ?? 'Attribute'}</label>
                                                                                                                                                                                            <select multiple class="form-control attribute-values-select" data-attribute-id="${attributeId}">
                                                                                                                                                                                                ${data.map(v => `<option value="${v.id}">${v.name}</option>`).join('')}
                                                                                                                                                                                            </select>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    `;
                    $('#attribute-values-container').append(html);
                });
            });
        });

        $(document).on('click', '.remove-variation', function () {
            $(this).closest('tr').remove();
            updateCombinationLabels();
            updateCombinationsJson();
        });


        $(document).on('change', '.attribute-values-select', function () {
            generateCombinations();
        });

        function generateCombinations() {
            const allSelected = {};
            $('.attribute-values-select').each(function () {
                const attrId = $(this).data('attribute-id');
                const values = $(this).val();
                if (values?.length > 0) allSelected[attrId] = values;
            });

            const combinations = cartesianProduct(Object.values(allSelected));
            const tbody = $('#combinations-table tbody');

            const existingKeys = new Set();

            // امسح الصفوف اللي اتعملت مؤقتًا فقط (اللي مالهاش data-variation-id)
            tbody.find('tr:not([data-variation-id])').remove();

            // احفظ المفاتيح الحالية من كل الصفوف الباقية (القديمة فقط الآن)
            tbody.find('tr').each(function () {
                const key = $(this).find('input[type="hidden"][name*="[value_ids]"]').map(function () {
                    return $(this).val();
                }).get().sort().join('-');

                if (key) existingKeys.add(key);
            });

            let currentIndex = $('#combinations-table tbody tr').length;

            combinations.forEach((combo) => {
                const key = combo.slice().sort().join('-');
                if (existingKeys.has(key)) return;

                const label = combo.map(id => {
                    return $(`.attribute-values-select option[value="${id}"]`).text();
                }).join(' + ');

                const hiddenInputs = combo.map(id => `<input type="hidden" name="combinations[${currentIndex}][value_ids][]" value="${id}" />`).join('');

                $('#combinations-table tbody').append(`
                <tr>
                    <td>
                        <span class="combination-label">${label}</span>
                        ${hiddenInputs}
                    </td>
                    <td><input type="number" name="combinations[${currentIndex}][price]" class="form-control" step="0.01" required></td>
                    <td><input type="number" name="combinations[${currentIndex}][stock]" class="form-control" required></td>
                    <td>
                        <input type="file" name="combinations[${currentIndex}][image]" class="form-control" accept="image/*">
                        <!-- ❌ لا تضف img فاضية هنا -->
                    </td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-variation">🗑️</button></td>
                </tr>
            `);

                existingKeys.add(key);
                currentIndex++;
            });



            attachCombinationTriggers(); // ← يعيد ربط الـ events من جديد بعد كل توليد
            updateCombinationLabels();
            updateCombinationsJson();
        }

        $(document).ready(function () {
            updateCombinationLabels();

            // لو في صفوف موجودة بالفعل (تعديل منتج) حدث الـ JSON فورًا
            if ($('#combinations-table tbody tr').length > 0) {
                updateCombinationsJson();
            }

            // باقي الكود
            $('#combinations-table').on('input change', 'input', function () {
                updateCombinationsJson();
            });

            $('#combinations-table').on('click', '.remove-variation', function () {
                setTimeout(updateCombinationsJson, 100);
            });
        });


        function cartesianProduct(arr) {
            if (arr.length === 0) return [];
            if (arr.length === 1) return arr[0].map(item => [item]);
            return arr.reduce((a, b) => a.flatMap(d => b.map(e => [].concat(d, e))));
        }
    </script>
    <script>
        function toggleConditionalFields() {
            const parent = $('#parent').val();
            if (parent == 0) {
                $('#price').attr('required', 'required');
                $('#stock').attr('required', 'required');
            } else {
                $('#price').removeAttr('required');
                $('#stock').removeAttr('required');
            }
        }

        $(document).ready(function () {
            toggleConditionalFields();
            $('#parent').on('change', toggleConditionalFields);
        });
    </script>
    <script>
        $(document).on('click', '.remove-image-btn', function () {
            const index = $(this).data('index');
            const $td = $(this).closest('td');

            // 1. Clear the image preview
            $td.find('img').remove();

            // 3. Add a hidden input to signal backend to remove the image
            $td.append(`<input type="hidden" name="combinations[${index}][remove_image]" value="1">`);

            // 4. Remove the delete button
            $(this).remove();
        });
    </script>
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description:ar', {
            contentsLangDirection: 'rtl'
        });
        CKEDITOR.replace('description:en', {
            contentsLangDirection: 'ltr'
        });
    </script>


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
                $('#attributes').hide();
            } else {
                $('#child').show();
                $('#attributes').show();
            }
        });
        $(document).ready(function () {
            if ($('#parent').val() == 0 || $('#parent').val() == '') {
                $('#child').hide();
                $('#attributes').hide();
            } else {
                $('#child').show();
                $('#attributes').show();
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            Sortable.create(document.querySelector("#combinations-table tbody"), {
                animation: 150,
                handle: 'td'
            });
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
    <script>
        function updateCombinationLabels() {
            $('#combinations-table tbody tr').each(function () {
                const $row = $(this);
                const hiddenInputs = $row.find('input[type="hidden"][name*="[value_ids]"]');
                const labels = [];

                hiddenInputs.each(function () {
                    const valueId = $(this).val();
                    const optionText = $(`.attribute-values-select option[value="${valueId}"]`).text();
                    if (optionText) labels.push(optionText);
                });

                const labelText = labels.join(' + ');

                // فقط عدل محتوى span.combination-label بدل ما تضيف من جديد
                const $labelSpan = $row.find('.combination-label');
                if ($labelSpan.length) {
                    $labelSpan.text(labelText);
                }
            });
        }


        function updateCombinationsJson() {
            const rows = $('#combinations-table tbody tr');
            const data = [];

            rows.each(function () {
                const $row = $(this);
                const variationId = $row.data('variation-id') ?? null;

                const valueIds = $row.find('input[name*="[value_ids]"]').map(function () {
                    return $(this).val();
                }).get();

                // هنا الحل 👇 يدعم النوعين
                const price = $row.find('input[name*="[price]"], input[name*="[price_override]"]').val();
                const stock = $row.find('input[name*="[stock]"], input[name*="[quantity]"]').val();

                data.push({
                    variation_id: variationId,
                    value_ids: valueIds,
                    price: price,
                    stock: stock,
                });
            });

            $('#combinations_json').val(JSON.stringify(data));
        }

        // وظيفة لإعادة توليد التركيبات في كل تغيير
        function attachCombinationTriggers() {
            // كل مرة يتغير فيها أي select لقيم الخصائص
            $(document).off('change', '.attribute-values-select').on('change', '.attribute-values-select', function () {
                generateCombinations();
            });

            // كل مرة يتم تغيير select الخصائص
            $(document).off('change', '#selected_attributes').on('change', '#selected_attributes', function () {
                const selectedAttributeIds = $(this).val();
                $('#attribute-values-container').empty();

                if (!selectedAttributeIds?.length) return;

                let requests = selectedAttributeIds.map(attributeId => {
                    return $.get(`${getVariationsUrl}?attribute_id=${attributeId}`);
                });

                Promise.all(requests).then(responses => {
                    responses.forEach((data, index) => {
                        let attributeId = selectedAttributeIds[index];
                        let html = `
                                                                                                    <div class="mb-3">
                                                                                                        <label>${data[0]?.attribute?.name ?? 'Attribute'}</label>
                                                                                                        <select multiple class="form-control attribute-values-select" data-attribute-id="${attributeId}">
                                                                                                            ${data.map(v => `<option value="${v.id}">${v.name}</option>`).join('')}
                                                                                                        </select>
                                                                                                    </div>`;
                        $('#attribute-values-container').append(html);
                    });

                    // بعد ملء القيم، نولد التركيبات
                    generateCombinations();
                    // تفعيل select2 لكل القيم الجديدة
                    $('#attribute-values-container .attribute-values-select').select2({
                        width: '100%',
                        placeholder: "اختر القيم",
                        allowClear: true,
                        closeOnSelect: true
                    });

                });
            });
        }

        attachCombinationTriggers();
        $(document).ready(function () {
            $('#selected_attributes').select2({
                width: '100%',
                placeholder: "اختر الخصائص",
                allowClear: true,
                closeOnSelect: true
            });
        });

    </script>
@endpush