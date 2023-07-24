    <!-- Add Brand Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Brand</h5>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="storeBrand">

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Pilih Kategori</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($categories as $cateItem)
                                <option value="{{ $cateItem->id}}">{{$cateItem->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nama Brand</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Slug Brand</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label> <br/>
                            <input type="checkbox" wire:model.defer="status" style="width: 70px;height=70px"/> Checked = Hidden || Unchecked = Visible
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- Update Brand Modal -->
    <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h5>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> Loading...
                </div>

                <div wire:loading.remove>
                    <form wire:submit.prevent="updateBrand">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Pilih Kategori</label>
                                <select wire:model.defer="category_id" required class="form-control">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($categories as $cateItem)
                                    <option value="{{ $cateItem->id}}">{{$cateItem->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Nama Brand</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Slug Brand</label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" wire:model.defer="status" style="width: 70px;height=70px"/> Checked = Hidden || Unchecked = Visible
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                            <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Update Brand Modal -->


    <!-- Delete Brand Modal -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Hapus Brand</h5>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> Loading...
                </div>

                <div wire:loading.remove>
                    <form wire:submit.prevent="destroyBrand">

                        <div class="modal-body">
                            <h6>Apakah anda yakin akan menghapus data ini?</h6>
                        </div>
                            <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Ya. Hapus!</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Delete Brand Modal -->
