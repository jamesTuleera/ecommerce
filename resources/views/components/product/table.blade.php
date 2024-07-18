<div class="table">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>

        {{-- @php $sn = $products->firstItem() @endphp --}}

        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>


                    @if (isset($product->productImages[0]))

                    <img src="{{ asset('storage/products_images/' . $product->productImages[0]->name ) }}" alt="">

                    @else

                    No Image
                    @endif


                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>

                <td>
                    {{-- <a href="{{ route('admin.edit.product', $product->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                </td>
            </tr>
        @endforeach

    </table>
</div>

<div class="paginate">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
