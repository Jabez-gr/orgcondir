<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Industries</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 650px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 40px 32px 32px 32px;
        }
        h1 {
            text-align: center;
            color: #4f8cff;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9fafb;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: #4f8cff;
            outline: none;
            background: #fff;
        }
        textarea {
            min-height: 60px;
            resize: vertical;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }
        .checkbox-group label {
            margin: 0 0 0 8px;
            font-weight: normal;
        }
        button[type="submit"] {
            width: 100%;
            background: #4f8cff;
            color: #fff;
            border: none;
            padding: 12px 0;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #2563eb;
        }
        .alert {
            background: #ffeaea;
            color: #d32f2f;
            border: 1px solid #f5c2c7;
            border-radius: 6px;
            padding: 12px 18px;
            margin-bottom: 18px;
        }
        @media (max-width: 700px) {
            .container {
                padding: 20px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <<h1>Edit Industry</h1>

        @if ($errors->any())
            <div class="alert">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    

    <form action="{{ route('industries.update', $industry->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Industry Name:</label>
        <input type="text" id="name" name="name" value="{{ $industry->name }}" required>
        <button type="submit">Update Industry</button>
    </form>
    </div>
</body>
</html>