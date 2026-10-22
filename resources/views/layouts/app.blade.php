<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Mahasiswa') - SIAKAD</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS & JS via Vite (Langkah 7) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fallback Tailwind CSS CDN jika vite dev/build belum aktif -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Instrument Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen flex flex-col">
    <!-- Header / Navbar Partial (Langkah 8 & 10) -->
    @include('partials.navbar')

    <div class="flex-1 flex overflow-hidden">
        <!-- Sidebar Partial (Langkah 9, 10, & 11) -->
        @include('partials.sidebar')

        <!-- Main Content Area (Langkah 5) -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-50/50">
            <div class="max-w-7xl mx-auto space-y-6">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer (Langkah 5) -->
    <footer class="bg-white border-t border-gray-200 py-4 px-6 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} Sistem Informasi Akademik (SIAKAD) - Tugas Mandiri 4: Dashboard Mahasiswa.</p>
    </footer>
</body>
</html>
