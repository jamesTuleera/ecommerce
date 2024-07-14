@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Manage Product Categories
                            </h3>
                        </div>




<!-- Button trigger modal -->


                        <div class="row mt-5">
                            <div class="col-md-5">
                                <div class="card">

                                    <div class="card-body p-4">
                                        <h4>Add product</h4>
                                        <form action="{{ route('admin.create.category') }}" method="POST" class="mt-5">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="Category name" name="name"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card">

                                    <div class="card-body p-4">

                                        <div class="d-flex justify-content-between">
                                            <strong>
                                                <h4>Categories</h4>
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
                                        @php $sn = $categories->firstItem() @endphp
                                        @forelse ($categories as $category)
                                            <p class="d-flex justify-content-between"> <span>{{ $sn++ }}. &nbsp;
                                                    {{ $category->name }}</span>
                                                <span>
                                                    <a href="" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-eye"></i></a>


                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#{{ 'edit' . $category->id }}"> <i
                                                            class="fa fa-edit"></i>
                                                    </button>


                                                    <a href="{{ route('admin.delete.category', $category->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </span>
                                            </p>
                                            <hr class="p-1 b-1 m-1">


                                        @empty
                                            <p class="text-center text-danger"> No category found</p>
                                        @endforelse



                                        <div class="d-flex justify-content-between mt-3 align-content-center">
                                            <div class="text-primary">
                                                Showing <strong>{{ $categories->firstItem() }}</strong> to
                                                <strong>{{ $categories->lastItem() }}</strong> out of
                                                <strong>{{ $categories->total() }}</strong> results
                                            </div>
                                            <span> {{ $categories->links('pagination::bootstrap-4') }}</span>
                                        </div>

                                        @isset($name)
                                            <div class="d-flex justify-content-between  align-content-center">
                                                <div class="text-primary">
                                                </div>
                                                <span><a href="{{ route('admin.category') }}">All Categories</a> </span>
                                            </div>
                                        @endisset
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

    @foreach ($categories as $categoryM)

      <!-- Modal -->
      <div class="modal fade" id="{{ 'edit' . $categoryM->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Category </h5>
              <button type="button" class="close btn btn-sm btn-outline-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.update.category') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" name="id" value="{{ $categoryM->id }}">
                        <input type="text" placeholder="Category name" name="name" value="{{ $categoryM->name }}"
                            class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Edit</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endSection
