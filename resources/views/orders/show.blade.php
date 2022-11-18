@includeIf('layouts.header');

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Orders Detail</h1>
            {{-- Cart --}}    
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
                                {{-- {{dd($orders_detail)}} --}}
                                @forelse ($orders_detail as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->product->name}}</td>
                                        <td>{{$data->qty}}</td>
                                        <td>{{$data->subtotal}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Orders Detail Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    
                    <div class="text-right">
                    @if ($orders_detail)
                        <p class="h5">Total Price : IDR {{$orders_detail->sum('subtotal')}}</p>
                    @else
                        <p class="h5">Total Price : 0</p>
                    @endif
                    <br/>
                    <button class="mt-3 btn btn-primary"><i class="fa fa-shopping-cart"></i> Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>

@includeIf('layouts.footer');