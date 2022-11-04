@includeIf('layouts.header');

<div class="card">
    <div class="card-header">
        <h1>Product List</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Stock</td>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No Products Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@includeIf('layouts.footer');