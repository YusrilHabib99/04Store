@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }},</h2>
        @endif

        <div class="me-md-3 me-xl-5">
            <h2>Dashboard,</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
            <hr>
        </div>

        {{-- Pesanan --}}
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Pesanan Total</label>
                    <h1>{{ $totalOrder }}</h1>
                    <a href=" {{ url('admin/orders') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Pesanan Hari Ini</label>
                    <h1>{{ $todayOrder }}</h1>
                    <a href=" {{ url('admin/orders') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Pesanan Bulan Ini</label>
                    <h1>{{ $thisMonthOrder }}</h1>
                    <a href=" {{ url('admin/orders') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label>Pesanan Tahun Ini</label>
                    <h1>{{ $thisYearOrder }}</h1>
                    <a href=" {{ url('admin/orders') }}" class="text-white">Lihat</a>
                </div>
            </div>
        </div>
        {{-- End Pesanan --}}

        {{-- Produk --}}
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Produk</label>
                    <h1>{{ $totalProducts }}</h1>
                    <a href=" {{ url('admin/products') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Total Kategori</label>
                    <h1>{{ $totalCategories }}</h1>
                    <a href=" {{ url('admin/category') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Total Brand</label>
                    <h1>{{ $totalBrands }}</h1>
                    <a href=" {{ url('admin/brands') }}" class="text-white">Lihat</a>
                </div>
            </div>
        </div>
        {{-- End Produk --}}

        {{-- User --}}
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Semua User</label>
                    <h1>{{ $totalAllUsers }}</h1>
                    <a href=" {{ url('admin/users') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label>Total User</label>
                    <h1>{{ $totalUser }}</h1>
                    <a href=" {{ url('admin/users') }}" class="text-white">Lihat</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label>Total Admin</label>
                    <h1>{{ $totalAdmin }}</h1>
                    <a href=" {{ url('admin/users') }}" class="text-white">Lihat</a>
                </div>
            </div>
        </div>
        {{-- End User --}}

        {{-- <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">Analytics</p>
            </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block">
                    <i class="mdi mdi-download text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                </button>
            <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
            </div>
        </div> --}}




    </div>
</div>


@endsection