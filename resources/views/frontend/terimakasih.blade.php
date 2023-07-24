@extends('layouts.app')

@section('title', 'Terimakasih')
    
@section('content')

{{-- 
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif 
--}}

<br>

    <div class="py-3 pyt-md-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    @if(session('message'))
                        <h5 class="alert alert-success"> {{ session('message') }} </h5>
                    @endif

                    <div class="p-4 shadow bg-white">
                        <h2>04: Store</h2>
                        <h4> Terimakasih sudah berbelanja di tempat kami</h4>
                        <a href="{{ url('/')}}" class="btn btn-primary"> Belanja Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection