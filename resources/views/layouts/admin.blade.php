@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="top-bar">
            <h2>Welcome <span class="underline">{{ auth()->user()->user_type }}</span></h2>
            <p>This Panel For You....</p>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Action Menu') }}</div>
                    <div class="card-body">
                        <ul class="nav navbar-nav">
                            <li class="nav-item rounded-md">
                                <a class="nav-link  p-3 rounded-md {{ Route::is('admin.profile') ? 'active' : '' }}"
                                    href="{{ route('admin.profile') }}">Profile</a>
                            </li>
                            <li class="nav-item rounded-md">
                                <a class="nav-link  p-3 rounded-md  {{ Route::is('admin.category') ? 'active' : '' }}"
                                    href="{{ route('admin.category') }}">Category</a>
                            </li>

                            <li class="nav-item rounded-md">
                                <a class="nav-link  p-3 rounded-md  {{ Route::is('admin.products') ? 'active' : '' }}"
                                    href="{{ route('admin.products') }}">Products</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($title) }}</div>
                    <div class="card-body">
                        @yield('mainContent')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
