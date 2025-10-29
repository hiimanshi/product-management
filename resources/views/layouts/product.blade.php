<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My App')</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            justify-content: flex-end;
            padding: 20px 40px;
        }

        .navbar a, .navbar form button {
            margin-left: 15px;
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar a:hover, .navbar form button:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .container {
            background: white;
            width: 70%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .product-form table{
            width: 50%;
            border: none;
            margin-left: auto;
            margin-right: auto;
        }
         .product-form td {
            border: none;
            text-align: left;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin: 10px 0;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 15px;
            padding: 10px 20px;
            border-radius: 6px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

/*     
        .product-form {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .product-form input, 
        .product-form textarea {
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: all 0.2s ease-in-out;
        }

        .product-form input:focus, 
        .product-form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.4);
        } */

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 8px;
        }

        .btn-secondary:hover {
            background-color: #565e64;
        }
    </style>
</head>
<body>

    <div class="navbar">
        @guest
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        @else
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endguest
    </div>

    <div class="container">
        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin:0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </div>

</body>
</html>
