@includeIf('layouts.header');

<div class="container">
    <div class="row">
        <div class="col-12">    
            <h1>Product List</h1>    
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Sell Price</td>
                        <td>Buy Price</td>
                        <td>Stock</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->sell_price}}</td>
                        <td>{{$product->buy_price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->category}}</td>
                        <td>
                            <a href="/products/{{$product->id}}/edit" class="btn btn-success">Edit</a>
                            <form method="post" action="{{url('/products/'.$product->id)}}" style="display:inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-danger" title="Delete Product" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Products Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('products.create')}}">Add Product</a>       
            </div>
        </div>
    </div>
</div>

@includeIf('layouts.footer');