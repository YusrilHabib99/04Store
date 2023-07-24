@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <h5 class="alert alert-success mb-2"> {{session('message')}} </h5>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Edit Produk
                    <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm text-white float-end">
                        KEMBALI</a>
                </h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!--Tab-->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Rincian
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="dimage-tab-pane" aria-selected="false">
                                Gambar Produk
                            </button>
                        </li>
                    </ul>
                    <!--End Tab-->

                    <div class="tab-content" id="myTabContent">
                        <!--Home tab-->
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="bm-3">
                                <label>Pilih Kategori</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Nama Produk</label>
                                <input type="text" name="name" value=" {{$product->name}} " class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Produk Slug</label>
                                <input type="text" name="slug" value=" {{$product->slug}} " class="form-control">
                            </div>
                            <div class="bm-3">
                                <label>Pilih Brand</label>
                                <select name="brand" class="form-control">
                                    <option value="">Pilih Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>
                                        {{$brand->name}} 
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Deskripsi Singkat (500 Kata)</label>
                                <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <!--End Home tab-->

                        <!--SEO tab-->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag" tabindex="0">
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <!--End SEO tab-->

                        <!--Detail tab-->
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Harga Asli</label>
                                        <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Harga Jual</label>
                                        <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Stok</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label><br/>
                                        <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked':''}} style="width: 50px; heigth: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Unggulan</label><br/>
                                        <input type="checkbox" name="featured" {{$product->featured == '1' ? 'checked':''}} style="width: 50px; heigth: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label><br>
                                        <input type="checkbox" name="status" {{$product->status == '1' ? 'checked':''}} style="width: 50px; heigth: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Detail tab-->

                        <!--Image-->
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Gambar Produk</label>
                                <input type="file" name="image[]" multiple class="form-control"/>
                            </div>
                            <div>
                                @if ($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img src=" {{asset($image->image) }} " style="width: 80px; height:80px;" 
                                            class="me-4 border" alt="img">
                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete')}} " class="d-block">Hapus</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>Tidak memiliki gambar</h5>
                                @endif
                            </div>
                        </div>
                        <!--End Image-->

                    </div>
                    <!--Button Update-->
                    <div class="py-2 float-end">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                    <!--End Button Update-->
                </form>

            </div>
        </div>
    </div>
</div>

@endsection