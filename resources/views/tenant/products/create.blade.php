<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

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

</body>
</html>
