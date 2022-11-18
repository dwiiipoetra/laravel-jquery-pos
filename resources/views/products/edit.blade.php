@includeIf('layouts.header');

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Product</h1>
            <form action="{{url('products/'.$product->id)}}" method="post">
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <input value="{{ $product->name }}" type="text" class="form-control mb-3" placeholder="Product Name" name="name" required/>
                    <input value="{{ $product->sell_price }}" type="number" class="form-control mb-3" placeholder="Sell Price" name="sell_price" required/>
                    <input value="{{ $product->buy_price }}" type="number" class="form-control mb-3" placeholder="Buy Price" name="buy_price" required/>
                    <input value="{{ $product->stock }}" type="number" class="form-control mb-3" placeholder="Stock" name="stock" required/>
                    <input value="{{ $product->category }}" type="text" class="form-control mb-3" placeholder="Category Name" name="category" required/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@includeIf('layouts.footer');