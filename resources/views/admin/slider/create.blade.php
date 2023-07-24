@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-succes"> {{session('message')}} </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Tambah Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-primary btn-sm text-white float-end">
                        Kembali
                    </a>
                </h3>
            </div>
            
            <div class="card-body">
                <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label>Status</label> <br/>
                        <input type="checkbox" name="status" style="width:20px; height:20px"/>
                        : Checked=Hidden || Unchecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection