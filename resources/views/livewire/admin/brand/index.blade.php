<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Daftar Brands
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary text-white btn-sm float-end">Tambah Brand</a>
                    </h3>
                </div>
                <!-- Table -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($brands as $brand)
                                    
                                <tr>
                                    <td> {{ $brand->id }} </td>
                                    <td> {{ $brand->name }} </td>
                                    <td> 
                                        @if ($brand->category)
                                            {{ $brand->category->name }} 
                                        @else
                                            Tanpa Kategori
                                        @endif
                                    </td>
                                    <td> {{ $brand->slug }} </td>
                                    <td> {{ $brand->status == '1' ? 'hidden':'visible' }} </td>
                                    <td style="text-align:center;">
                                        <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5"> No Brands Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{$brands->links()}}
                        </div>
                    </div>
                </div>
                <!-- End Table -->
            </div>
        </div>
    </div>

</div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
    
@endpush
