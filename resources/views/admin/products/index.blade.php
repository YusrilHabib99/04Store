@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }} </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Produk
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Tambah Produk
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td> {{$product->id}} </td>
                                <td> 
                                    @if ($product->category)
                                        {{$product->category->name}}
                                    @else
                                        Tanpa Kategori
                                    @endif
                                </td>
                                <td> {{$product->name}} </td>
                                <td> {{$product->selling_price}} </td>
                                <td> {{$product->quantity}} </td>
                                <td> {{$product->status == '1' ? 'Hidden':'Visible'}} </td>
                                <td style="text-align:center;">
                                    <a href="{{url('admin/products/'.$product->id.'/edit')}} " class="btn btn-sm btn-success">Edit</a>
                                    <a href=" {{url('admin/products/'.$product->id.'/delete')}} " onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-sm btn-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Produk Tidak Tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection