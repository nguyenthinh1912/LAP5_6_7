<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lab5 Eloquent ORM')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-500 text-white p-4 mb-6">
        <h1 class="text-xl font-bold">Louis</h1>
        <nav>
            <a href="{{ route('movies.index') }}" class="mr-4">Danh sách phim</a>
            <a href="{{ route('movies.search') }}">Tìm kiếm</a>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-gray-600">
        Thinhndph45212@fpt.edu.vn
    </footer>
</body>
</html>
