{{-- The whole world belongs to you. --}}
<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}

            <div class="row bg-white">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->image)}}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">

                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach ($product->productImages as $itemImg)
                                    <li><img src="{{ asset($itemImg->image)}}"/></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            Tidak ada gambar
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            {{-- Label Stok --}}
                            @if ($product->quantity > 0)
                                <label class="label-stock text-white bg-success">Tersedia</label>
                            @else
                                <label class="label-stock text-white bg-danger">Terjual</label>
                            @endif
                            {{-- End Label Stok --}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <p class="product-path">Brand: {{$product->brand}}</p>
                        <div>
                            <span class="selling-price">Rp.{{$product->selling_price}}</span>
                            <span class="original-price">Rp.{{$product->original_price}}</span>
                        </div>

                        {{-- Warna --}}
                        {{-- End Warna --}}

                        {{-- Stok --}}
                        @if ($product->quantity > 0)
                            <label class="btn-sm text-white bg-success ">Stok : {{$product->quantity}} </label>
                        @else
                            <label class="btn-sm text-white bg-danger">Stok : {{$product->quantity}}</label>
                        @endif
                        {{-- End Stok --}}

                        {{-- Tombol -+ Kuantitas --}}
                        <br>
                        <br>
                        <br>
                        {{-- <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div> --}}
                        {{-- End Tombol -+ Kuantitas --}}

                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToCart">
                                    <i class="fa fa-shopping-cart"></i> +ke Keranjang
                                </span>
                                <span wire:loading wire:target="addToCart">
                                    ...
                                </span>
                            </button>

                            <button type="button" wire:click="addToWishlist({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> +ke Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist">
                                    ...
                                </span>
                            </button>

                        </div>

                        <hr>
                        
                        <div class="mt-3">
                            <h5 class="mb-0">Deskripsi Singkat</h5>
                            <p>
                                {!! $product->small_description !!}                           
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Deskripsi</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Deskripsi --}}

        </div>
    </div>

    {{-- Kategori Terkait --}}
    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-3">
                    <h4>
                        Produk Kategori
                        @if($category) {{ $category->name }} @endif
                        Terkait
                    </h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts as $relatedProductItem)
                            <div class="item mb-3">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        @if ($relatedProductItem->productImages->count() > 0)
                                        <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                            <img src="{{ asset($relatedProductItem->productImages[0]->image)}}" alt="{{$relatedProductItem->name}}">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                    {{$relatedProductItem->name}} 
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">Rp.{{$relatedProductItem->selling_price}}</span>
                                            <span class="original-price">Rp.{{$relatedProductItem->original_price}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h5>Tidak ada produk Terkait</h5>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    {{-- End Kategori Terkait --}}

    {{-- Brand Terkait --}}
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>
                        Produk Brand
                        @if($product) {{ $product->brand }} @endif
                        Terkait
                    </h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts as $relatedProductItem)
                                @if ($relatedProductItem->brand == "$product->brand")
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($relatedProductItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                <img src="{{ asset($relatedProductItem->productImages[0]->image)}}" alt="{{$relatedProductItem->name}}">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                        {{$relatedProductItem->name}} 
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">Rp.{{$relatedProductItem->selling_price}}</span>
                                                <span class="original-price">Rp.{{$relatedProductItem->original_price}}</span>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h5>Tidak ada produk Terkait</h5>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    {{-- End Brand Terkait --}}


</div>

@push('scripts')

<script>
    $(function(){

        $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        // autoplay
        "autoPlay": false,

        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000

        });

    });

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
    
@endpush
