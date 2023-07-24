    {{-- Nothing in the world is as soft and yielding as water. --}}
<div>
    <div class="row">
        <div class="col-md-3">

            {{-- Filter Brand --}}
            @if ($category->brands)
            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}"/> {{$brandItem->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
            {{-- Filter Brand --}}

            {{-- Filter Harga --}}
            <div class="card mt-3">
                <div class="card-header"><h4>Harga</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"/> Tinggi - Rendah
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"/> Rendah - Tinggi
                    </label>
                </div>
            </div>
            {{-- End Filter Harga --}}

            {{-- Filter Terjual
            <div class="card mt-3">
                <div class="card-header">Produk Terjual</div>
                <div class="card-body">
                    @forelse ($products as $productItem)
                        
                    @if ($productItem->quantity->count() == 0)
                    <label class="d-block">
                        <input type="radio" wire:model="brandInput" value="{{$productItem->name}}"/> Terjual
                    </label>
                    @endif
                    @empty
                    <label>Tidak ada produk terjual</label>
                    @endforelse
                </div>
            </div>
            End Filter Terjual --}}

        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">Tersedia</label>
                                @else
                                    <label class="stock bg-danger">Terjual</label>
                                @endif
                                @if ($productItem->productImages->count() > 0)
                                <a 
                                    href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
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
                <div class="col-md-12">
                    <div class="p-2">
                        <h4 class="text-danger">Tidak ada produk tersedia untuk kategori "{{$category->name}}" </h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
