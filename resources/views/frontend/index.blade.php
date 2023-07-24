{{-- Title n Desc. for design Slider from src.
    Title :
        <span>Best Ecommerce Solutions 1 </span>
        to Boost your Brand Name &amp; Sales
    Description :
        We offer an industry-driven and successful digital marketing strategy that helps our clients
        in achieving a strong online presence and maximum company profit.
--}}


{{-- Normal desain text slider
        {{$sliderItem->title}}

        {{$sliderItem->description}}
--}}


@extends('layouts.app')

@section('title', '04 : Store')
    
@section('content')

<!--Slider-->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                    @if ($sliderItem->image)
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">    
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!!$sliderItem->title!!}
                            </h1>
                            <p>
                                {!!$sliderItem->description!!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<!--End Slider-->

<!--Selamat Datang-->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Selamat datang di 04 : Store</h4>
                    <div class="underline mx-auto"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex mollitia totam,
                        corporis rem at cum labore nihil nam perferendis commodi optio a accusantium 
                        reiciendis vitae esse perspiciatis eaque? Quae, cumque!
                    </p>
                </div>
            </div>
        </div>
    </div>
<!--End Selamat Datang-->


<!--Trending/Populer Produk-->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Produk Populer</h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($trendingProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                            <label class="stock bg-danger">Populer!</label>

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
                        @endforeach
                    </div>                
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4 class="text-danger">Tidak ada produk Populer tersedia</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
<!--End Trending Produk-->

<!--Terbaru Produk-->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Produk Terbaru
                        <a href="{{ url('new-arrivals')}}" class="btn btn-warning float-end">Lebih banyak</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($newArrivalsProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($newArrivalsProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                            <label class="stock bg-danger">Baru!</label>

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
                        @endforeach
                    </div>                
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4 class="text-danger">Tidak ada produk Terbaru tersedia</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
<!--End Terbaru Produk-->

<!--Featured/Unggulan Produk-->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Produk Unggulan
                        <a href="{{ url('featured-products')}}" class="btn btn-warning float-end">Lebih banyak</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($featuredProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($featuredProducts as $productItem)
                            <div class="item">
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
                        @endforeach
                    </div>                
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4 class="text-danger">Tidak ada produk Unggulan tersedia</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
<!--End Featured/Unggulan Produk-->

@endsection

{{-- Owl Carousel --}}
@section('script')

<script>
    $('.four-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>

@endsection
{{-- End Owl Carousel --}}