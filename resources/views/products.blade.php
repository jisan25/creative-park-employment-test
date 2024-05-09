@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <!--  Add Product Modal -->
    {{-- <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">{{ __('Add Department') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group ">
                            <label class="form-label mt-0">{{ __('Department Name') }}</label>
                            <input type="text" class="form-control" name="dep_name"
                                placeholder="{{ __('Department Name') }}" required>
                            </select>
                        </div>



                        <div class="form-group ">
                            <label class="form-label mt-0">{{ __('Status') }}</label>
                            <select name="status" style="width:100%" class="form-control">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>

                </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label mt-0">{{ __('Product Title') }}</label>
                            <input type="text" class="form-control" name="title"
                                placeholder="{{ __('Product Title') }}" required>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mt-0 d-block">{{ __('Select Features') }}</label>
                            @foreach ($features as $item)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{ 'inlineCheckbox' . $item->id }}"
                                        value="{{ $item->id }}" name="features[]">
                                    <label class="form-check-label"
                                        for="{{ 'inlineCheckbox' . $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mt-0 d-block">{{ __('Select Categories') }}</label>
                            @foreach ($categories as $item)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{ 'category' . $item->id }}"
                                        value="{{ $item->id }}" name="categories[]">
                                    <label class="form-check-label"
                                        for="{{ 'category' . $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label mt-0 d-block">{{ __('Select Image') }}</label>
                            <input type="file" name="product_image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add
                Product</button>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="products mb-3">
            @foreach ($products as $product)
                <div class="__single">
                    <div class="image">
                        <img class="w-100" src="{{ asset('images/' . $product->image) }}" alt="">
                    </div>
                    <div>
                        <h2>{{ $product->title }}</h2>
                        <div>
                            <p class="fw-bold m-0">Categories:</p>
                            <div>
                                @foreach ($product->categories as $category)
                                    <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <p class="fw-bold m-0">Features:</p>
                            <ul>
                                @foreach ($product->features as $feature)
                                    <li class="text-capitalize">{{ $feature->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $products->links() }}
    </div>

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>
@endsection
