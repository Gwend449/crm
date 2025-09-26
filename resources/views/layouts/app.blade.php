<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    @include('layouts.navbar')
    <main class="container mx-auto px-4 py-6 flex-grow">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
    @livewireScripts
</body>

<footer class="bg-gray-800 text-gray-400 text-center py-4 mt-6">
    <p>&copy; {{ date('Y') }} Detailing CRM.</p>
</footer>

</html>
