@includeIf('layouts.header');

<div class="container">
    <div class="row shadow p-3 mb-5 bg-body rounded">
        <div class="col-12">
            <h1>Orders</h1>
    
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
                        <option value="{{$product->id}}">{{$product->name}} - Rp {{$product->sell_price}} - ({{$product->stock}} pcs)</option>
                    @endforeach
                </select>
                <label for="">Quantity</label>
                <input name="qty" type="number" class="form-control" placeholder="1" required>
                
                <button class="mt-3 btn btn-primary"><i class="fa fa-plus"></i> Add Product</button>
            </form>    
        </div>

        <div class="col-6">
            <h1>List Orders</h1>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>No Faktur</td>
                        <td>Consumer Name</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($orders)}} --}}
                    @forelse($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->no_faktur}}</td>
                        <td>{{$order->consumer_name}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            <a href="/orders/{{$order->id}}" class="btn btn-success">View</a>
                            <form method="post" action="{{url('/orders/1')}}" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="L7nGHm8niRTO8jOV3LSQUiGw20bdBtfLq5HwIQum">
                                <button class="btn btn-danger" title="Delete Product" onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Orders Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@includeIf('layouts.footer');