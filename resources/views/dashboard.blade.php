@extends('layouts.admin')

@section('content')

<!-- Header Dashboard -->
<div class="relative bg-gradient-to-r from-teal-600 to-emerald-500 rounded-3xl p-8 text-white mb-8 shadow-lg overflow-hidden">
    <!-- Dekorasi Background -->
    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-40 h-40 bg-black/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10">
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight drop-shadow-sm">
            Dashboard Program Masjid
        </h1>
        <p class="mt-2 text-teal-50 text-lg font-medium">
            Selamat datang kembali, {{ Auth::user()->name }}
        </p>

        @if(Auth::user()->role == 'user')
            <div class="mt-6 inline-flex items-center gap-3 bg-white/20 backdrop-blur-md border border-white/30 px-5 py-2.5 rounded-2xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="text-teal-50">
                    Masjid: <strong class="ml-1 text-white tracking-wide">{{ Auth::user()->masjid->nama ?? '-' }}</strong>
                </span>
            </div>
        @endif
    </div>
</div>

@if(Auth::user()->role == 'admin')

    <!-- Dashboard Admin: Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
        
        <!-- Card: Daerah -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Daerah</h3>
                <div class="p-2 bg-teal-50 text-teal-600 rounded-lg group-hover:bg-teal-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-extrabold text-teal-600 mt-4">{{ $totalDaerah }}</p>
        </div>

        <!-- Card: Masjid -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Masjid</h3>
                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-extrabold text-blue-600 mt-4">{{ $totalMasjid }}</p>
        </div>

        <!-- Card: Kelas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Kelas</h3>
                <div class="p-2 bg-amber-50 text-amber-500 rounded-lg group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-extrabold text-amber-500 mt-4">{{ $totalKelas }}</p>
        </div>

        <!-- Card: Murid -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Murid</h3>
                <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-extrabold text-indigo-600 mt-4">{{ $totalMurid }}</p>
        </div>

        <!-- Card: Pengajar -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Pengajar</h3>
                <div class="p-2 bg-rose-50 text-rose-600 rounded-lg group-hover:bg-rose-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-extrabold text-rose-600 mt-4">{{ $totalPengajar }}</p>
        </div>

    </div>

    <!-- Header Tabel & Export -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">
            Ringkasan Data Masjid
        </h2>
        <a href="{{ route('laporan.dashboard') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-600 to-red-500 text-white font-semibold px-5 py-2.5 rounded-xl hover:from-rose-500 hover:to-red-400 focus:ring-4 focus:ring-red-500/30 transition-all shadow-md transform hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export PDF
        </a>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-teal-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider">Masjid</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider">Daerah</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-teal-800 tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-teal-800 tracking-wider">Murid</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-teal-800 tracking-wider">Pengajar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($ringkasanMasjid as $item)
                        <tr class="hover:bg-teal-50/30 transition-colors duration-200">
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $item->nama }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ $item->daerah->nama }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center text-gray-600">
                                {{ $item->kelas_count }}
                            </td>
                            <td class="px-6 py-4 text-center text-gray-600">
                                {{ $item->murid_count }}
                            </td>
                            <td class="px-6 py-4 text-center text-gray-600">
                                {{ $item->pengajar_count }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <span class="text-sm">Belum ada data masjid tersedia</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@else

    <!-- Dashboard User: Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Card: Kelas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center">
            <div class="inline-flex p-3 rounded-2xl bg-amber-50 text-amber-500 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div class="text-sm text-gray-500 uppercase tracking-widest font-semibold">Total Kelas</div>
            <div class="text-5xl font-extrabold text-amber-500 mt-3">{{ $totalKelas }}</div>
        </div>

        <!-- Card: Murid -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center">
            <div class="inline-flex p-3 rounded-2xl bg-indigo-50 text-indigo-600 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div class="text-sm text-gray-500 uppercase tracking-widest font-semibold">Total Murid</div>
            <div class="text-5xl font-extrabold text-indigo-600 mt-3">{{ $totalMurid }}</div>
        </div>

        <!-- Card: Pengajar -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center">
            <div class="inline-flex p-3 rounded-2xl bg-rose-50 text-rose-600 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div class="text-sm text-gray-500 uppercase tracking-widest font-semibold">Total Pengajar</div>
            <div class="text-5xl font-extrabold text-rose-600 mt-3">{{ $totalPengajar }}</div>
        </div>

    </div>

@endif

@endsection