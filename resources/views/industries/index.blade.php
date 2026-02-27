<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        header {
            background-color: #4f8cff;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .create-btn {
            background-color: #fff;
            color: #4f8cff;
            border: 2px solid #4f8cff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            position: absolute;
            right: 30px;
            top: 30px;
        }
        .create-btn:hover {
            background-color: #4f8cff;
            color: #fff;
        }
        .header-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            position: absolute;
            left: 30px;
            top: 15px;
        }
        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 0;
        }
        .header-content h1 {
            margin-bottom: 18px;
            margin-top: 0;
        }
        .search-form {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-bottom: 10px;
            background: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            width: 100%;
            max-width: 420px;
        }
        .search-form input[type="text"] {
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1rem;
            width: 220px;
            color: #222;
            background: #f8f8f8;
        }
        .search-form button {
            padding: 6px 16px;
            border-radius: 4px;
            border: none;
            background: #4f8cff;
            color: #fff;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .search-form button:hover {
            background: #3570c9;
        }
        main {
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 8px;
            text-align: left;
        }
        th {
            background-color: #eaf1fb;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
        .pagination .active span,
        .pagination span[aria-current="page"] {
            background: #4f8cff;
            color: #fff !important;
            border-radius: 4px;
            padding: 5px 10px;
        }
        .links a {
            color: #4f8cff;
            margin: 0 5px;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .nav-links {
            margin: 30px 0 0 0;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .nav-links a {
            color: #4f8cff;
            text-decoration: none;
            font-weight: bold;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .success-message {
            color: green;
            margin: 15px 0;
        }
        .no-data {
            text-align: center;
            color: #888;
            margin: 20px 0;
        }
        footer {
            background: #eaf1fb;
            color: #4f8cff;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
        }
        footer a {
            color: #4f8cff;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('images/1b.jpeg') }}" alt="Header Image" class="header-image">
        <div class="header-content">
            <h1>Industries</h1>
            <form action="{{ route('industries.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search industries..." value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>
        <a href="{{ route('industries.create') }}">Create New Industry</a>
    </header>
    
    <main>
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($industries as $industry)
                <tr>
                    <td>{{ $industry->name }}</td>
                    <td>{{ $industry->description }}</td>
                    <td>{{ $industry->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('industries.edit', $industry->id) }}">Edit</a>
                        <form action="{{ route('industries.destroy', $industry->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Industries: {{ $industries->count() }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="pagination">
            {{ $industries->links() }}
    </div>
    </main>
    <footer>
        &copy; {{ date('Y') }} Departments Dashboard. All rights reserved.
        <a href="{{ url('/') }}">Home</a>
        <p>Contact us at <a href="mailto:jabez@example.com">jabez@example.com</a></p>
        <p>Follow us on <a href="https://www.Instagram.com">Instagram</a>, <a href="https://www.facebook.com">Facebook</a> and <a href="https://www.twitter.com">Twitter</a></p>
        <p>Visit our website at <a href="https://www.example.com">https://www.example.com</a></p>
        <p>Copyright &copy; {{ date('Y') }} Your Company</p>

    </footer>
</body>
</html>