{{-- The best athlete wants his opponent at his best. --}}
<div>
    <div class="py-3 py-md-4 checkout bg-light">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Total Tagihan :
                                <span class="float-end">Rp. {{ $this->totalProductAmount }}</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Informasi Detail
                            </h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" wire:model.defer="fullname" class="form-control"
                                        placeholder="Masukan nama lengkap" />
                                    @error('fullname')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Nomer Telepon</label>
                                    <input type="number" wire:model.defer="phone" class="form-control"
                                        placeholder="Masukan nomer telepon" />
                                    @error('phone')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" wire:model.defer="email" class="form-control"
                                        placeholder="Masukan alamat email" />
                                    @error('email')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" wire:model.defer="pincode" class="form-control"
                                        placeholder="Masukan Pin-Code" />
                                    @error('pincode')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Alamat Lengkap</label>
                                    <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Pilih Metode Pembayaran: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on
                                                Delivery</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                id="onlinePayment-tab" data-bs-toggle="pill"
                                                data-bs-target="#onlinePayment" type="button" role="tab"
                                                aria-controls="onlinePayment" aria-selected="false">Pembayaran
                                                Online</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel"
                                                aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery (COD)</h6>
                                                <hr />
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order (COD)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        ...
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online (Payment Gateway)</h6>
                                                <hr />
                                                <button type="button" id="pay-button" wire:loading.attr="disabled"
                                                    class="btn btn-warning">Pilih
                                                    Pembayaran</button>

                                                {{-- <button id="pay-button" wire:click="pembayaran"
                                                    class="btn btn-warning">Pilih
                                                    Pembayaran</button> --}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4>Tidak ada produk dalam Keranjang untuk di-Checkout</h4>
                    <a href="{{ url('collections') }}" class="btn btn-warning"> Belanja Sekarang</a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-TRpLZvStgR8nzt-S"></script>

    <script type="text/javascript">
        document.addEventListener('livewire:load', function() {
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');

            payButton.addEventListener('click', function() {

                console.log('proses pembayaran');

                Livewire.emit('pembayaran');
                Livewire.on('gettoken', (res) => {

                    console.log(res);

                    window.snap.pay(res.token);
                });

            });
        });
    </script>
@endpush
