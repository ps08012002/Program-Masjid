<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Masjid</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50/70 text-gray-800 antialiased">

<div class="flex min-h-screen">

    <aside class="w-68 bg-teal-950 text-gray-300 flex flex-col border-r border-teal-900/40 shadow-xl">

        <div class="p-6 border-b border-teal-900/60 bg-teal-950 flex items-center gap-3">
            <img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=150&q=80" 
                 alt="Logo Masjid" 
                 class="w-9 h-9 rounded-xl object-cover shadow-md shadow-emerald-500/20 border border-teal-700/60"
            >
            <div>
                <h1 class="text-md font-extrabold text-white tracking-wide leading-none">
                    Program Masjid
                </h1>
                <span class="text-[10px] text-emerald-400 font-bold tracking-widest uppercase">Management System</span>
            </div>
        </div>

        <nav class="flex-1 p-4 overflow-y-auto space-y-7">
            
            <div>
                <span class="px-4 text-[11px] font-bold tracking-wider text-teal-500/80 uppercase block mb-3">Menu Utama</span>
                <ul class="space-y-1.5">
                    <li>
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </div>

            @if(Auth::user()->role == 'admin')
            <div>
                <span class="px-4 text-[11px] font-bold tracking-wider text-teal-500/80 uppercase block mb-3">Data Wilayah</span>
                <ul class="space-y-1.5">
                    <li>
                        <a href="{{ route('daerah.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Data Daerah
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('masjid.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Data Masjid
                        </a>
                    </li>
                </ul>
            </div>
            @endif

            <div>
                <span class="px-4 text-[11px] font-bold tracking-wider text-teal-500/80 uppercase block mb-3">Kependidikan</span>
                <ul class="space-y-1.5">
                    <li>
                        <a href="{{ route('kelas.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>
                            Data Kelas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('murid.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                            </svg>
                            Data Murid / Santri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengajar.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h11v8H3V4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 12v3m5-3v3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 11h3a1.5 1.5 0 011.5 1.5v4.5h-1v-3.5h-1v3.5h-1v-4.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 11.5L10 9.5" />
                            </svg>
                            Data Pengajar / Asatidz
                        </a>
                    </li>
                </ul>
            </div>

            @if(Auth::user()->role == 'admin')
            <div>
                <span class="px-4 text-[11px] font-bold tracking-wider text-teal-500/80 uppercase block mb-3">Akun</span>
                <ul class="space-y-1.5">
                    <li>
                        <a href="{{ route('user.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-gray-300 hover:bg-teal-900/50 hover:text-emerald-400 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Manajemen User
                        </a>
                    </li>
                </ul>
            </div>
            @endif

        </nav>
        
        <div class="p-4 border-t border-teal-900/50 text-center text-xs text-teal-600/70 font-medium bg-teal-950/40">
            Mr_Uwaaw
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0">

        <header class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center sticky top-0 z-40 shadow-sm shadow-gray-100/40">

            <div>
                <h2 class="text-xl font-extrabold text-gray-800 tracking-tight">
                    Dashboard Utama
                </h2>
                <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-0.5">
                    <span>Akses Tingkat:</span>
                    <span class="bg-teal-50 text-teal-700 font-bold px-2 py-0.5 rounded-md border border-teal-100 uppercase text-[10px]">
                        {{ Auth::user()->role }}
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-6">

                <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-50 to-emerald-100 border border-teal-200/50 flex items-center justify-center text-teal-700 font-bold text-sm shadow-inner">
                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                    </div>
                    
                    <div class="text-left hidden sm:block">
                        <p class="font-bold text-sm text-gray-800 tracking-wide leading-tight">
                            {{ Auth::user()->username }}
                        </p>
                        @if(Auth::user()->masjid)
                            <p class="text-xs font-semibold text-emerald-600 flex items-center gap-1 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ Auth::user()->masjid->nama }}
                            </p>
                        @endif
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="inline-flex items-center gap-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs px-4 py-2.5 rounded-xl border border-rose-100/60 transition-all duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/xl" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>
                </form>

            </div>

        </header>

        <div class="p-8 flex-1 overflow-y-auto">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>