@extends('layouts.admin')

@section('content')

<!-- Header -->
<div class="bg-gradient-to-r from-green-700 to-green-500 rounded-xl p-8 text-white mb-6 shadow">

    <h1 class="text-3xl font-bold">
        Dashboard Program Masjid
    </h1>

    <p class="mt-2 text-green-100">
        Selamat datang, {{ Auth::user()->name }}
    </p>

    @if(Auth::user()->role == 'user')

        <div class="mt-4 inline-block bg-white/20 px-4 py-2 rounded-lg">
            Masjid :
            <strong>
                {{ Auth::user()->masjid->nama ?? '-' }}
            </strong>
        </div>

    @endif

</div>

@if(Auth::user()->role == 'admin')

    <!-- Dashboard Admin -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500">Daerah</h3>
            <p class="text-4xl font-bold text-green-600 mt-2">
                {{ $totalDaerah }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500">Masjid</h3>
            <p class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalMasjid }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500">Kelas</h3>
            <p class="text-4xl font-bold text-yellow-500 mt-2">
                {{ $totalKelas }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500">Murid</h3>
            <p class="text-4xl font-bold text-purple-600 mt-2">
                {{ $totalMurid }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-gray-500">Pengajar</h3>
            <p class="text-4xl font-bold text-red-600 mt-2">
                {{ $totalPengajar }}
            </p>
        </div>

    </div>

<div class="mb-6", style="text-align: right">

    <a href="{{ route('laporan.dashboard') }}"
       class="bg-red-600 text-white px-4 py-2 rounded-lg">

        Export PDF

    </a>

</div>   
@if(Auth::user()->role == 'admin')

<div class="bg-white rounded-xl shadow">

    <div class="p-6 border-b">

        <h2 class="text-xl font-semibold">
            Ringkasan Data Masjid
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="px-6 py-3 text-left">Masjid</th>
                    <th class="px-6 py-3 text-left">Daerah</th>
                    <th class="px-6 py-3 text-center">Kelas</th>
                    <th class="px-6 py-3 text-center">Murid</th>
                    <th class="px-6 py-3 text-center">Pengajar</th>
                </tr>

            </thead>

            <tbody>

                @forelse($ringkasanMasjid as $item)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $item->nama }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->daerah->nama }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $item->kelas_count }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $item->murid_count }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $item->pengajar_count }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-4">

                            Belum ada data

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endif

@else

    <!-- Dashboard User -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-sm text-gray-500">
                Total Kelas
            </div>

            <div class="text-5xl font-bold text-yellow-500 mt-2">
                {{ $totalKelas }}
            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-sm text-gray-500">
                Total Murid
            </div>

            <div class="text-5xl font-bold text-purple-600 mt-2">
                {{ $totalMurid }}
            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <div class="text-sm text-gray-500">
                Total Pengajar
            </div>

            <div class="text-5xl font-bold text-red-600 mt-2">
                {{ $totalPengajar }}
            </div>

        </div>

    </div>

@endif

@endsection