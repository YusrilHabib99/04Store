@extends('layouts.app')

@section('title', 'Produk Unggulan')
    
@section('content')

<!--Produk Unggulan-->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Produk Unggulan</h4>
                    <div class="underline mb-4"></div>
                </div>

                @forelse ($featuredProducts as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                                <label class="stock bg-danger">Unggulan!</label>

                            @if ($productItem->productImages->count() > 0)
                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                <img src="{{ asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$productItem->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name}} 
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">Rp.{{$productItem->selling_price}}</span>
                                <span class="original-price">Rp.{{$productItem->original_price}}</span>
                            </div>

                            {{-- Tombol Keranjang, Hati, dan Mata --}}
                            {{--
                            <div class="mt-2">
                                <a href="" class="btn btn1">+<i class="fa fa-shopping-cart"></i> </a>
                                <a href="" class="btn btn1">+<i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"><i class="fa fa-eye"></i> </a> 
                            </div>
                            --}}
                            {{-- End Tombol Keranjang, Hati, dan Mata --}}

                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h4>Tidak ada produk Unggulan tersedia</h4>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('collections')}}" class="btn btn-warning px-3">Lebih banyak</a>
                </div>

            </div>
        </div>
    </div>
<!--End Produk Unggulan-->


@endsection