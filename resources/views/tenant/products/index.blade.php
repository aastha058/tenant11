<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<h1>Products</h1>

<a href="{{ route('tenant.products.create') }}">Add Product</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>

    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
        </tr>
    @endforeach
</table>


</x-app-layout>

