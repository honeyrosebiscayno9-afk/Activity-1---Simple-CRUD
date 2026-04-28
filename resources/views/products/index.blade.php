<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        h1 {
            text-align: center;
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .form-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .form-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .add-btn {
            background-color: #28a745;
            color: white;
        }
        .add-btn:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
            font-size: 14px;
        }
        .edit-btn {
            background-color: #007bff;
            color: white;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            color: #666;
        }
        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PRODUCTS</h1>

        <div class="form-container">
            <form method="POST" action="/store" class="form-group">
                @csrf
                <input type="text" name="name" placeholder="Product Name" required>
                <input type="number" name="price" placeholder="Price" step="0.01" required>
                <button type="submit" class="add-btn">+ Add Product</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>
                        <button class="action-btn edit-btn">Edit ✏️</button>
                        <form action="/delete/{{ $product->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn">Delete 🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>1</td>
                    <td>Laptop</td>
                    <td>₱25,000.00</td>
                    <td>
                        <button class="action-btn edit-btn">Edit ✏️</button>
                        <button class="action-btn delete-btn">Delete 🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mouse</td>
                    <td>₱500.00</td>
                    <td>
                        <button class="action-btn edit-btn">Edit ✏️</button>
                        <button class="action-btn delete-btn">Delete 🗑️</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Keyboard</td>
                    <td>₱1,200.00</td>
                    <td>
                        <button class="action-btn edit-btn">Edit ✏️</button>
                        <button class="action-btn delete-btn">Delete 🗑️</button>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>
        © 2024 Product Management System
    </footer>
</body>
</html>