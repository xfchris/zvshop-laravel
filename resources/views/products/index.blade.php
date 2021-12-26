<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="h4 font-weight-bold mb-0">
                {{ __('app.product_management.title') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="btn btn-xs btn-primary text-light py-0 d-flex align-items-center">
                <i class="fas fa-plus-circle"></i> <span class="ms-1">@lang('app.product_management.create_product')</span>
            </a>
        </div>
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card my-4">
        <div class="card-body">

            <table class="table table-bordered table-striped" aria-describedby="Users table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width:5%">Id</th>
                        <th scope="col" style="width:25%">Name</th>
                        <th scope="col" style="width:20%">Category</th>
                        <th scope="col" style="width:15%">Price ({{ config('constants.currency') }})</th>
                        <th scope="col" style="width:15%">Status</th>
                        <th scope="col" style="width:10%">Quantity</th>
                        <th scope="col" style="width:10%">Created</th>
                        <th scope="col" style="width:15%">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><span class="badge bg-info">{{ $product->category->name }}</span></td>
                            <td>@money($product->price)</td>
                            <td>
                                @if ($product->trashed())
                                    <span class="badge bg-danger">{{ _('Disabled') }}</span>
                                @else
                                    <span class="badge bg-success">{{ _('Enabled') }}</span>
                                @endif
                            </td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-xs btn-primary text-light py-0 d-flex align-items-center">
                                        <i class="fas fa-edit"></i> <span class="ms-1">Edit</span>
                                    </a>
                                    @if ($product->trashed())
                                        <a href="{{ route('admin.products.enable', $product->id) }}"
                                            class="btn btn-xs btn-dark text-light ms-1 py-0 d-flex align-items-center">
                                            <i class="fas fa-eye"></i> <span class="ms-1">Enable</span>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.products.disable', $product->id) }}"
                                            class="btn btn-xs btn-secondary text-light ms-1 py-0 d-flex align-items-center">
                                            <i class="fas fa-eye-slash"></i> <span class="ms-1">Disable</span>
                                        </a>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
