@includeIf('layouts.header');

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Add Product</h1>
            <form action="{{route('products.store')}}" method="post">
            @csrf
            @method('POST')
                <div class="form-group">
                    <input type="text" class="form-control mb-3" placeholder="Product Name" name="name" required/>
                    <input type="number" class="form-control mb-3" placeholder="Sell Price" name="sell_price" required/>
                    <input type="number" class="form-control mb-3" placeholder="Buy Price" name="buy_price" required/>
                    <input type="number" class="form-control mb-3" placeholder="Stock" name="stock" required/>
                    <input type="text" class="form-control mb-3" placeholder="Category Name" name="category" required/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@includeIf('layouts.footer');