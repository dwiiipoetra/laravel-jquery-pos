@includeIf('layouts.header');

<div class="card">
    <div class="card-header">
        <h1>Orders</h1>
    </div>
    <div class="card-body">
        @if ($message = Session::get('message'))
        <div class="alert alert-primary">
            <button class="close">
                <span>&times;</span>
            </button>
            <strong>{{$message}}</strong>
        </div>
        @endif

        {{-- Add Order --}}
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-primary">
                    <form action="{{route('orders.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                            <h4>Choose Products</h4>
                        </div>
                        <div class="card-body">
                            <label for="">Product Name</label>
                            <select name="product_id" class="form-control">
                                <option value="0">Choose Product</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}} - Rp {{$product->price}} - ({{$product->stock}} pcs)</option>
                                @endforeach
                            </select>
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" placeholder="1" name="qty">
                        </div>
                        <div class="card-footer">        
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Cart --}}
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-primary">
                    <form action="#" method="post">
                        <div class="card-header">
                            <h4>Cart Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th colspan="2">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_items as $cart)
                                            @foreach($cart->cartproduct as $cp)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cp->name}}</td>
                                                    <td>{{$cart->qty}}</td>
                                                    <td>{{$cart->subtotal}}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br/>
                            <div class="text-right">
                                <p class="h5">Total Price : IDR</p>
                            </div>
                            <br/>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@includeIf('layouts.footer');