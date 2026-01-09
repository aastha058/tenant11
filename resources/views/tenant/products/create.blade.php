<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('tenant.products.store') }}">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Price</label>
        <input type="number" step="0.01" name="price">
    </div>

    <div>
        <label>Quantity</label>
        <input type="number" name="quantity">
    </div>

    <button type="submit">Save</button>
</form>
    </div>
</x-app-layout>


