@extends('layouts.app')

@section('title', 'My Orders Details')
    
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> Rincian Pesanan
                            <a href="{{url('orders')}}" class="btn btn-danger btn-sm float-end">Kembali</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Rincian Pesanan</h5>
                                <hr>
                                <h6>ID Pesanan: {{$order->id}}</h6>
                                <h6>Tracking ID/No.: {{$order->tracking_no}}</h6>
                                <h6>Tanggal Pemesanan: {{$order->created_at->format('d-m-y h:i A')}}</h6>
                                <h6>Metode Pembayaran: {{$order->payment_mode}}</h6>
                                <h6 class="border p-2 text-success">
                                    Status Pesanan: <span class="text-uppercase">{{$order->status_message}}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Rincian Pembeli</h5>
                                <hr>
                                <h6>Nama: {{$order->fullname}}</h6>
                                <h6>Email: {{$order->email}}</h6>
                                <h6>No.Telepon: {{$order->phone}}</h6>
                                <h6>Alamat: {{$order->address}}</h6>
                                <h6>Pin Code: {{$order->pincode}}</h6>
                            </div>
                        </div>

                        <br>
                        <h5>Produk Pesanan</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Produk</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{$orderItem->id}}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->productImages)
                                                        <img src="{{ asset($orderItem->product->productImages[0]->image)}}" 
                                                            style="width: 50px; height: 50px" alt="">
                                                    @else
                                                        <img src="" 
                                                            style="width: 50px; height: 50px" alt="">
                                                @endif
                                            </td>
                                            <td width="10%">{{$orderItem->product->name}}</td>
                                            <td width="10%">Rp.{{$orderItem->price}}</td>
                                            <td width="10%">{{$orderItem->quantity}}</td>
                                            <td width="10%" class="fw-bold">Rp.{{$orderItem->quantity * $orderItem->price}}</td>
                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Harga Total:</td>
                                        <td colspan="1" class="fw-bold">Rp.{{$totalPrice}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection