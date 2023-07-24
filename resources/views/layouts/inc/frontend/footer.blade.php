<br>
<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'website name'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>

                <!-- Quick Links-->
                <div class="col-md-3">
                    {{-- <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Tentang</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Kontak</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">-</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">-</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Sitemaps</a></div> --}}
                </div>
                <!-- Quick Links-->

                <div class="col-md-3">
                    <h4 class="footer-heading">Belanja Sekarang</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/collections')}}" class="text-white">Kategori</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Produk Trending</a></div>
                    <div class="mb-2"><a href="{{url('/new-arrivals')}}" class="text-white">Produk Terbaru</a></div>
                    <div class="mb-2"><a href="{{url('/featured-products')}}" class="text-white">Produk Unggulan</a></div>
                    <div class="mb-2"><a href="{{url('/cart')}}" class="text-white">Keranjang</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Alamat</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>
                            {{ $appSetting->address ?? 'address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone 1'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email 1'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - 04: Store. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Sosial Media:
                        @if ( $appSetting->facebook )
                            <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ( $appSetting->whatsapp )
                            <a href="{{ $appSetting->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                        @endif
                        @if ( $appSetting->instagram )
                            <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ( $appSetting->youtube )
                            <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>