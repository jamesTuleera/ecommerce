<div class="table">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>

        {{-- @php $sn = $products->firstItem() @endphp --}}

        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>

                    @if (!empty($product->productImg()))
                        <img src="{{ asset('storage/products_images/' . $product->productImg()) }}" alt="">

                        @if ($product->productImages->count() > 1)
                            <small>  {{ '+ '. $product->productImages->count()  - 1   }}</small>
                        @endif
                        {{-- <small>  {{ $product->productImages->count() > 1 ? '+ '. $product->productImages->count()  - 1 : ''  }}</small> --}}
                    @else
                        <img src="{{ asset('public_assets/images/shoping-bag.jpg') }}" alt="">
                    @endif

                    {{ $product->productImge ?? '' }}


                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>N{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->description }}</td>

                <td>
                    <a href="{{ route('admin.update.product', $product->id) }}" class="btn btn-sm btn-warning"><i
                            class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach

    </table>
</div>

<div class="paginate">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
