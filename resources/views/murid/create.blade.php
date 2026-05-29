@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
    
    <!-- Header Form -->
    <div class="mb-8 border-b border-gray-50 pb-4">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
            Tambah Data Murid
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Daftarkan profil murid/santri baru beserta penempatan kelasnya ke dalam sistem.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('murid.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Input Nama Murid -->
        <div>
            <label for="nama" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Nama Lengkap Murid
            </label>
            <input type="text"
                   id="nama"
                   name="nama"
                   value="{{ old('nama') }}"
                   placeholder="Contoh: Muhammad Raihan"
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

        <!-- Pilihan Kelas (Dropdown) -->
        <div>
            <label for="id_kelas" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Penempatan Kelas
            </label>
            <div class="relative">
                <select id="id_kelas"
                        name="id_kelas"
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('id_kelas') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                    <option value="" disabled {{ old('id_kelas') ? '' : 'selected' }}>-- Pilih Kelas --</option>
                    @foreach($kelas as $item)
                        <option value="{{ $item->id }}" {{ old('id_kelas') == $item->id ? 'selected' : '' }}>
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

            @error('id_kelas')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Input File Foto Premium -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Foto Profil Murid
            </label>
            
            <div class="flex flex-col sm:flex-row items-center gap-5 p-4 bg-gray-50/50 border border-gray-200 rounded-2xl @error('foto') border-rose-400 @enderror">
                <!-- Icon Placeholder Foto -->
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 rounded-xl bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Input Kontrol Unggah -->
                <div class="w-full text-center sm:text-left">
                    <span class="block text-xs font-bold text-teal-800 uppercase tracking-wider mb-1.5">Unggah Foto Profil</span>
                    <input type="file" 
                           name="foto" 
                           id="foto"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all cursor-pointer">
                    <p class="text-xs text-gray-400 mt-1.5">Format berkas: JPG, JPEG, atau PNG. Ukuran maksimal 2MB.</p>
                </div>
            </div>

            @error('foto')
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
            <a href="{{ route('murid.index') }}"
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