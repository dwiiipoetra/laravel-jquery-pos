@includeIf('layouts.header');

<div class="container">
    <div class="row shadow p-3 mb-5 bg-body rounded">
        <div class="col-12">
            <h1>List Orders</h1>
    
            @if ($message = Session::get('message'))
            <div class="alert alert-primary">
                <div class="p-3 mb-2 bg-danger text-white">
                    <strong>{{$message}}</strong>
                </div>
            </div>
            @endif
        </div>
        
        {{-- Add Order --}}
        <div class="col-6">
            <form action="{{route('orders.store')}}" method="post" class="mb-4">
                @csrf
                @method('POST')
                <h4>Add Order</h4>
                <label for="">Consumer Name</label>
                <input name="consumer_name" type="text" class="form-control" placeholder="Consumer Name" required>
        
                
                <button class="mt-3 btn btn-primary"><i class="fa fa-plus"></i> Add Order</button>
            </form>
            <form action="{{route('ordersdetail.store')}}" method="post">
                @csrf
                @method('POST')
                <h4>Choose Products</h4>
                <label for="">OrderID</label>
                <select name="order_id" class="form-control">
                    <option value="0">Choose Purchase Order</option>
                    @foreach ($orders as $order)
                        <option value="{{$order->id}}">{{$order->no_faktur}} / {{$order->consumer_name}}</option>
                    @endforeach
                </select>
                <label for="">Product Name</label>
                <select name="product_id" class="form-control">
                    <option value="0">Choose Product</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}} - Rp {{$product->price}} - ({{$product->stock}} pcs)</option>
                    @endforeach
                </select>
                <label for="">Quantity</label>
                <input name="qty" type="number" class="form-control" placeholder="1" required>
                
                <button class="mt-3 btn btn-primary"><i class="fa fa-plus"></i> Add Product</button>
            </form>    
        </div>
        {{-- Cart --}}
        <div class="col-6">
            <form action="#" method="post">
                @csrf
                @method('POST')
                <h4>Cart Items</h4>
                
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
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        {{-- <td>{{$cart->product->name}}</td> --}}
                                        <td>{{$cart->qty}}</td>
                                        <td>{{$cart->subtotal}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    
                    <div class="text-right">
                    @if ($cart_items)
                        <p class="h5">Total Price : IDR {{$cart_items->sum('subtotal')}}</p>
                    @else
                        <p class="h5">Total Price : 0</p>
                    @endif
                    
                    <br/>
                    {{-- <a href="#" class="mt-3 btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Checkout
                    </a> --}}
                    <button class="mt-3 btn btn-primary"><i class="fa fa-shopping-cart"></i> Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>

@includeIf('layouts.footer');