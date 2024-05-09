@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @error('category')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Add Category</label>
                    <input type="text" class="form-control" name="category">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @foreach ($categories as $item)
                <div class="col-md-6">
                    <div class="single-category">
                        <h3 class="fw-bold">{{ $item->name }}</h3>

                        <p class="m-0">Total Products: {{ $item->products->count() }}</p>
                    </div>
                </div>
            @endforeach

            {{ $categories->links() }}
        </div>
    </div>
@endsection
