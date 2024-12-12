<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-Customer-Transaction System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
    <h1 class="mb-4">Product-Customer-Transaction System</h1>

    <!-- Products Section -->
    <h2>Products (all data ditampilkan)</h2>

    <form class="mb-3 d-flex justify-content-between">
    <button class="btn btn-primary" onclick="location.href='/products/create'">Tambah Produk</button>
    <div class="input-group">
        <input type="text" class="form-control" id="searchProduct" name="search" placeholder="Search Products">
        <div class="input-group-append">
            <a href="{{ route('searchByName') }}" class="btn btn-secondary">Search by Name</a>
            <a href="{{ route('searchByPriceNotEqual') }}" class="btn btn-secondary">Search by Price (Not Equal)</a>
            <a href="{{ route('searchByDescriptionLike') }}" class="btn btn-secondary">Search by Description (Like)</a>
        </div>
    </div>
</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Customers Section -->
    <h2>Customers (10 data pertama saja)</h2>
    <button class="btn btn-primary mb-3" onclick="location.href='/customers/create'">Tambah Customer</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>
                    <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/customers/{{ $customer->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Transactions Section -->
    <h2>Transactions (latest)</h2>
    <button class="btn btn-primary mb-3" onclick="location.href='/transactions/create'">Tambah Transaksi</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Transaction Date</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $latestTransaction->id }}</td>
                <td>{{ $latestTransaction->product->name }}</td>
                <td>{{ $latestTransaction->customer->first_name }} {{ $latestTransaction->customer->last_name }}</td>
                <td>{{ $latestTransaction->transaction_date }}</td>
                <td>{{ $latestTransaction->quantity }}</td>
                <td>{{ $latestTransaction->total_amount }}</td>
                <td>
                    <a href="/transactions/{{ $latestTransaction->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/transactions/{{ $latestTransaction->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>