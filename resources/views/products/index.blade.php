<h2>Simple Product CRUD</h2>

<form method="POST" action="/products">
    @csrf
    <input type="text" name="name" placeholder="Enter product" required>
    <button type="submit">Add</button>
</form>

<br>

<table border="1">
    <tr>
        <th>Product</th>
        <th>Action</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>