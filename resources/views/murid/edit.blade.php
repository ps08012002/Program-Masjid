@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8 relative">
    
    <div class="mb-8 border-b border-gray-50 pb-4">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
            Edit Data Murid
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Perbarui data profil, penempatan kelas, beserta foto formal dari murid/santri.
        </p>
    </div>

    <form action="{{ route('murid.update', $murid->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Nama Lengkap Murid
            </label>
            <input type="text"
                   id="nama"
                   name="nama"
                   value="{{ old('nama', $murid->nama) }}"
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

        <div>
            <label for="id_kelas" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Penempatan Kelas
            </label>
            <div class="relative">
                <select id="id_kelas"
                        name="id_kelas"
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('id_kelas') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                    <option value="" disabled>-- Pilih Kelas --</option>
                    @foreach($kelas as $item)
                        <option value="{{ $item->id }}" {{ old('id_kelas', $murid->id_kelas) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
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

        <div>
            <label class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Foto Profil Murid
            </label>
            
            <div class="flex flex-col sm:flex-row items-center gap-5 p-4 bg-gray-50/50 border border-gray-200 rounded-2xl @error('foto') border-rose-400 @enderror">
                <div class="flex-shrink-0">
                    @if($murid->foto)
                        <img src="{{ asset('storage/' . $murid->foto) }}" 
                             class="w-20 h-20 object-cover rounded-xl ring-4 ring-teal-500/10 shadow-sm"
                             alt="Foto {{ $murid->nama }}">
                    @else
                        <div class="w-20 h-20 rounded-xl bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="w-full text-center sm:text-left">
                    <span class="block text-xs font-bold text-teal-800 uppercase tracking-wider mb-1.5">Ganti File Foto</span>
                    <input type="file" 
                           name="foto" 
                           id="foto"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all cursor-pointer">
                    <p class="text-xs text-gray-400 mt-1.5">Format: JPG, JPEG, atau PNG. Maksimal 2MB.</p>
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

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-gray-50">
            <button type="button" 
                    onclick="toggleModal('delete-modal', true)"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-sm px-5 py-2.5 rounded-xl transition-all duration-200 order-last sm:order-first">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v4M4 7h16" />
                </svg>
                Hapus Murid
            </button>

            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <a href="{{ route('murid.index') }}"
                   class="inline-flex items-center justify-center font-semibold text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 px-5 py-2.5 rounded-xl transition-all duration-200">
                    Kembali
                </a>
                
                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-600 to-emerald-500 hover:from-teal-500 hover:to-emerald-400 text-white font-semibold text-sm px-6 py-2.5 rounded-xl shadow-md transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-teal-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<form id="real-delete-form" action="{{ route('murid.destroy', $murid->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
    <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="toggleModal('delete-modal', false)"></div>

    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-gray-100 p-6 transform transition-all scale-95 duration-300 opacity-100 z-10">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-rose-50 text-rose-600 mb-4">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 tracking-tight">Hapus Data Murid?</h3>
            <p class="text-sm text-gray-500 mt-2 px-2">
                Apakah Anda yakin ingin menghapus profil murid bernama <span class="font-semibold text-gray-800">"{{ $murid->nama }}"</span>? Seluruh data riwayat absensi dan capaian nilai santri ini akan hilang permanen.
            </p>
        </div>
        
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <button type="button" 
                    onclick="toggleModal('delete-modal', false)"
                    class="w-full inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold px-4 py-3 rounded-xl text-sm transition-all">
                Batal
            </button>
            <button type="button" 
                    onclick="document.getElementById('real-delete-form').submit();"
                    class="w-full inline-flex items-center justify-center bg-gradient-to-r from-rose-600 to-red-500 hover:from-rose-500 hover:to-red-400 text-white font-semibold px-4 py-3 rounded-xl text-sm shadow-md transition-all">
                Ya, Hapus Data
            </button>
        </div>
    </div>
</div>

<script>
    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        } else {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }
</script>

@endsection