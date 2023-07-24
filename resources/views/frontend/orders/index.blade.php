@extends('layouts.app')

@section('title', 'My Orders')
    
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4"> Pesanan-ku</h4>
                        <hr>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Tracking No.</th>
                                        <th>Nama</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Tanggal Order</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }} </td>
                                            <td>{{ $item->tracking_no }} </td>
                                            <td>{{ $item->fullname }} </td>
                                            <td>{{ $item->payment_mode }} </td>
                                            <td>{{ $item->created_at->format('d-m-y') }} </td>
                                            <td>{{ $item->status_message }} </td>
                                            <td><a href="{{url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"> Anda belum pernah melakukan order Produk</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{$orders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection