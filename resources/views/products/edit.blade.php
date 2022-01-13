<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="h4 font-weight-bold mb-0">
                @lang('app.product_management.edit_product')
            </h2>
        </div>
    </x-slot>


    <div class="card my-4">
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')


                @include('products.form')


                <a class="btn btn-secondary mt-4 me-2 btn-wait-submit text-light"
                    href="{{ route('admin.products.index') }}">Cancel</a>
                <button type="submit" class="btn btn-success mt-4 btn-wait-submit text-light" data-wait="Wait...">
                    @lang('app.product_management.edit_product')
                </button>
            </form>
        </div>
    </div>


</x-app-layout>
