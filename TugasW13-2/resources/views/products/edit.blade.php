<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $product->description }}</textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}">
        </div>

        <div>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="text" name="stock_quantity" id="stock_quantity" value="{{ $product->stock_quantity }}">
        </div>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>