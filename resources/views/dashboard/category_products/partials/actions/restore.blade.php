@can('restore', $category_product)
    <a href="#category_product-{{ $category_product->id }}-restore-model" class="btn btn-outline-primary btn-sm"
        data-toggle="modal">
        <i class="fas fa fa-fw fa-trash-restore"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="category_product-{{ $category_product->id }}-restore-model" tabindex="-1" role="dialog"
        aria-labelledby="modal-title-{{ $category_product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-{{ $category_product->id }}">
                        @lang('category_products.dialogs.restore.title')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('category_products.dialogs.restore.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::post(route('dashboard.category_products.restore', $category_product)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('category_products.dialogs.restore.cancel')
                    </button>
                    <button type="submit" class="btn btn-primary">
                        @lang('category_products.dialogs.restore.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endcan