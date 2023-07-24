@extends('layouts.admin')

@section('title', 'My Orders')
    
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-succes"> {{session('message')}} </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h4>Pesanan</h4>
            </div>
            <div class="card-body">

                <form action="" method="GET">

                    <div class="row">
                        <div class="col-md-3">
                            <label>Filter by Tanggal/Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('y-m-d')}}" class="form-control"/>
                        </div>
                        <div class="col-md-3">
                            <label>Filter by Status</label>
                            <select name="status" class="form-select">
                                <option value="">-Semua Status Pesanan-</option>
                                <option value="dalam proses" {{Request::get('status') == 'dalam proses' ? 'selected':''  }} >Dalam proses</option>
                                <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''  }}>Completed</option>
                                <option value="pending" {{Request::get('status') == 'pending' ? 'selected':''  }}>Pending</option>
                                <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected':''  }}>Cancelled</option>
                                <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected':''  }}>Out for Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>

                </form>
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
                                    <td><a href="{{url('admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">Lihat</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> No Order Available</td>
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

@endsection