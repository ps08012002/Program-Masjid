<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Masjid</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white">

        <div class="p-5 border-b border-slate-700">
            <h1 class="text-xl font-bold">
                Program Masjid
            </h1>
        </div>

        <nav class="p-4">

            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard') }}"
                       class="block px-4 py-2 rounded hover:bg-slate-700">
                        Dashboard
                    </a>
                </li>

                @if(Auth::user()->role == 'admin')

                    <li>
                        <a href="{{ route('daerah.index') }}"
                           class="block px-4 py-2 rounded hover:bg-slate-700">
                            Daerah
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('masjid.index') }}"
                           class="block px-4 py-2 rounded hover:bg-slate-700">
                            Masjid
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.index') }}"
                           class="block px-4 py-2 rounded hover:bg-slate-700">
                            User
                        </a>
                    </li>

                @endif

                <li>
                    <a href="{{ route('kelas.index') }}"
                       class="block px-4 py-2 rounded hover:bg-slate-700">
                        Kelas
                    </a>
                </li>

                <li>
                    <a href="{{ route('murid.index') }}"
                       class="block px-4 py-2 rounded hover:bg-slate-700">
                        Murid
                    </a>
                </li>

                <li>
                    <a href="{{ route('pengajar.index') }}"
                       class="block px-4 py-2 rounded hover:bg-slate-700">
                        Pengajar
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="block px-4 py-2 rounded hover:bg-slate-700">
                        Laporan
                    </a>
                </li>

            </ul>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1">

        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">

            <div>
                <h2 class="text-xl font-semibold">
                    Dashboard
                </h2>

                <p class="text-sm text-gray-500">
                    {{ ucfirst(Auth::user()->role) }}
                </p>
            </div>

            <div class="flex items-center gap-4">

                <div class="text-right">
                    <p class="font-semibold">
                        {{ Auth::user()->username }}
                    </p>

                    @if(Auth::user()->masjid)
                        <p class="text-xs text-gray-500">
                            {{ Auth::user()->masjid->nama }}
                        </p>
                    @endif
                </div>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Logout
                    </button>

                </form>

            </div>

        </header>

        <div class="p-6">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>