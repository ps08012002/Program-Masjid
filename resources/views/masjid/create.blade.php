@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
    
    <!-- Header Form -->
    <div class="mb-8 border-b border-gray-50 pb-4">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
            Tambah Data Masjid
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Daftarkan masjid baru beserta alamat lengkap dan wilayah daerah operasionalnya ke dalam sistem.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('masjid.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Input Nama Masjid -->
        <div>
            <label for="nama" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Nama Masjid
            </label>
            <input type="text"
                   id="nama"
                   name="nama"
                   value="{{ old('nama') }}"
                   placeholder="Contoh: Masjid Jami' Al-Ikhlas"
                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('nama') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
            >

            @error('nama')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Input Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Alamat Lengkap
            </label>
            <textarea id="alamat"
                      name="alamat"
                      rows="4"
                      placeholder="Masukkan nama jalan, nomor, RT/RW, kelurahan, dan kecamatan..."
                      class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('alamat') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
            >{{ old('alamat') }}</textarea>

            @error('alamat')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Pilihan Daerah (Dropdown) -->
        <div>
            <label for="id_daerah" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Wilayah / Daerah
            </label>
            <div class="relative">
                <select id="id_daerah"
                        name="id_daerah"
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('id_daerah') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                    <option value="" disabled {{ old('id_daerah') ? '' : 'selected' }}>-- Pilih Wilayah Daerah --</option>
                    @foreach($daerah as $item)
                        <option value="{{ $item->id }}" {{ old('id_daerah') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <!-- Kustom Arrow Dropdown -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>

            @error('id_daerah')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-50">
            <a href="{{ route('masjid.index') }}"
               class="inline-flex items-center justify-center font-semibold text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 px-5 py-2.5 rounded-xl transition-all duration-200">
                Kembali
            </a>
            
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-600 to-emerald-500 hover:from-teal-500 hover:to-emerald-400 text-white font-semibold text-sm px-6 py-2.5 rounded-xl shadow-md transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-teal-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2v-9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                Simpan Data
            </button>
        </div>
    </form>
</div>

@endsection