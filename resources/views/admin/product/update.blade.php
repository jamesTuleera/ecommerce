@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Update Product
                            </h3>
                        </div>




                        <!-- Button trigger modal -->


                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body p-4">
                                        <h4>Update product</h4>







                                        <form action="{{ route('admin.create.product') }}" enctype="multipart/form-data"
                                            method="POST" class="mt-5">
                                            <div class="row">
                                                @csrf
                                                <div class="form-group col-md-6">
                                                    <label for="">Name</label>
                                                    <input type="text" placeholder="Product name" name="name"
                                                        value="{{ $product->name }}" class="form-control form-control-sm">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="">Price</label>
                                                    <input type="number" placeholder="Price" name="price"
                                                        value="{{ $product->price }}" class="form-control form-control-sm">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="">Category</label>
                                                    <select name="category_id" id="" class="form-select">
                                                        <option value="{{ $product->category->id }}">
                                                            {{ $product->category->name }}</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="">Image</label>
                                                    <input type="file" name="images[]" multiple
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="">Description</label>
                                                    <textarea placeholder="Description" name="description" class="form-control">{{ $product->description }}</textarea>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        </form>


                                        <hr class="mt-5 mb-5">

                                        <h3 class="font-weight-bold">Product Images</h3>
                                        <div class="row">

                                            @if (!empty($product->productImg()))
                                                @foreach ($product->productImages as $image)
                                                    <div class="col-md-3 mb-4">
                                                        <img src="{{ asset('storage/products_images/' . $image->name) }}"
                                                            class="img-fluid" alt="">
                                                            <button class="btn btn-link btn-sm mt-1" ><i class="fa fa-edit text-primary"></i> Edit</button>
                                                            <a href="{{ route('admin.delete.product.image', $image->id) }}" class="btn btn-link btn-sm mt-1 text-danger" ><i class="fa fa-trash "></i> Delete</a>

                                                    </div>
                                                @endforeach
                                            @else
                                                <h4 class="text-muted">No image</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ms-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endSection
