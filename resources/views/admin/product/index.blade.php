@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Manage Product
                            </h3>
                        </div>




<!-- Button trigger modal -->


                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body p-4">
                                        <h4>Add product</h4>
                                        <form action="{{ route('admin.create.category') }}" method="POST" class="mt-5">
                                            <div class="row">
                                                @csrf
                                            <div class="form-group col-md-6">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="Product name" name="name"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Price</label>
                                                <input type="number" placeholder="Price" name="name"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Category</label>
                                                <select name="category" id="" class="form-select">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Image</label>
                                                <input type="file" name="name"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="">Description</label>
                                                <textarea  placeholder="Description" name="name"
                                                    class="form-control"></textarea>
                                            </div>


                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between">
                                            <strong>
                                                <h4>Product</h4>
                                            </strong>
                                            <span class="" style="width: 250px">
                                                <form action="{{ route('admin.search.category') }}">@csrf
                                                    <button class="btn btn-sm border-0 "><i
                                                            class="fa fa-search text-muted border-0"></i></button>
                                                    <input type="search" value="{{ $name ?? '' }}" placeholder="Search"
                                                        name="name" id="" class="rounded  border-0 pl-5">
                                                </form>
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <strong>Item</strong>
                                            <span class="">
                                                <strong>Action</strong>
                                            </span>
                                        </div>
                                        <hr class="p-1 b-1 m-2">
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
