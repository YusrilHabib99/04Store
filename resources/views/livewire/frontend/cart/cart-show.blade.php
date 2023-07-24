{{-- The whole world belongs to you. --}}
<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h3>Keranjang-ku</h3>
            <hr>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Produk</h4>
                                </div>
                                {{-- OPSI
                                <div class="col-md-1">
                                    <h4>Stok</h4>
                                </div> 
                                --}}
                                <div class="col-md-2">
                                    <h4>Harga</h4>
                                </div>
                                <div class="col-md-2">
                                    {{-- <h4>Kauntitas</h4> --}}
                                </div>
                                <div class="col-md-2">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Aksi</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($cart as $cartItem)
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-5 my-auto">
                                            <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                <label class="product-name">

                                                    @if ($cartItem->product->productImages)
                                                        <img src="{{ asset($cartItem->product->productImages[0]->image)}}" 
                                                            style="width: 50px; height: 50px" alt="">
                                                    @else
                                                        <img src="" 
                                                            style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                        {{ $cartItem->product->name}}

                                                </label>
                                            </a>
                                        </div>

                                        {{-- OPSI
                                        <div class="col-md-1 my-auto">
                                            @if ($product->quantity > 0)
                                                <label class="btn-sm text-white bg-success ">Stok : {{$product->quantity}} </label>
                                            @else
                                                <label class="btn-sm text-white bg-danger">Stok : 0 {{$product->quantity}}</label>
                                            @endif
                                        </div> 
                                        --}}

                                        <div class="col-md-2 my-auto">
                                            <label class="price">
                                                Rp. {{$cartItem->product->selling_price}} 
                                            </label>
                                        </div>

                                        {{-- Kauantitas --}}
                                        <div class="col-md-2 col-7 my-auto">
                                            {{-- <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartItem->quantity}}" class="input-quantity" />
                                                    <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div> --}}
                                        </div>
                                        {{-- End Kauantitas --}}

                                        <div class="col-md-2 my-auto">
                                            <label class="price">Rp. {{$cartItem->product->selling_price * $cartItem->quantity}}</label>
                                            @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                        </div>

                                        <div class="col-md-1 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </span>
                                                    <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> ...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>Produk dalam keranjang masih kosong</div>
                        @endforelse


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h6>
                        Dapatkan harga dan produk terbaik <a href="{{ url('/')}}">Belanja sekarang</a>
                    </h6>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4> Total:
                            <span class="float-end">Rp. {{$totalPrice}} </span>
                        </h4>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-warning w-100"> <b>Beli</b></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
