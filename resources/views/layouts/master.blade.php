@includeIf('layouts.header');

<h1><a href="{{route('home')}}">Homepage</a></h1>
<ul>
  <li><a href="{{route('products.index')}}">Products</a></li>
  <li><a href="{{route('orders.index')}}">Orders</a></li>
</ul>

@includeIf('layouts.footer');
