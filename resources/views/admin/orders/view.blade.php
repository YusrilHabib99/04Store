@extends('layouts.admin')

@section('title', 'My Orders Details')
    
@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success mb-3"> {{session('message')}} </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Rincian Pesanan
                    <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">
                        <span class="fa fa-arrow-left"></span> Kembali
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-warning btn-sm float-end mx-1">
                        <span class="fa fa-download"></span> Unduh Invoice
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-primary btn-sm float-end mx-1">
                        <span class="fa fa-eye"></span> Lihat Invoice
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info btn-sm float-end mx-1">
                        <span class="fa fa-paper-plane"></span> Kirim Email Invoice
                        {{-- fa-paper-plane . fa-envelope --}}
                    </a>
                </h3>
            </div>
            <div class="card-body">

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
                                    <td width="5%">{{$orderItem->id}}</td>
                                    <td width="10%">
                                        @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image)}}" 
                                                    style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" 
                                                    style="width: 50px; height: 50px" alt="">
                                        @endif
                                    </td>
                                    <td width="25%">{{$orderItem->product->name}}</td>
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

        <div class="card border mt-3">
            <div class="card-body">
                <h4>Order Process (Order Status Updates)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Perbarui Status Pesanan Anda</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">-Pilih Status Pesanan-</option>
                                    <option value="dalam proses" {{Request::get('status') == 'dalam proses' ? 'selected':''  }} >Dalam proses</option>
                                    <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''  }}>Completed</option>
                                    <option value="pending" {{Request::get('status') == 'pending' ? 'selected':''  }}>Pending</option>
                                    <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected':''  }}>Cancelled</option>
                                    <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected':''  }}>Out for Delivery</option>    
                                </select>
                                <button type="submit" class="btn btn-primary text-white">Perbarui</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-7">
                        <h4 class="mt-3">Status Saat ini: <span class="text-uppercase">{{ $order->status_message}}</span></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection