@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8 relative">
    
    <!-- Header Form -->
    <div class="mb-8 border-b border-gray-50 pb-4">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
            Edit Data Daerah
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Perbarui informasi nama dan alamat wilayah cakupan program masjid di bawah ini.
        </p>
    </div>

    <!-- Form Utama (Update) -->
    <form action="{{ route('daerah.update', $daerah->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Input Nama Daerah -->
        <div>
            <label for="nama" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Nama Daerah
            </label>
            <input type="text"
                   id="nama"
                   name="nama"
                   value="{{ old('nama', $daerah->nama) }}"
                   placeholder="Contoh: Wilayah Pusat, Daerah Utara"
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
                      placeholder="Tuliskan alamat lengkap sekretariat atau batas wilayah..."
                      class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('alamat') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
            >{{ old('alamat', $daerah->alamat) }}</textarea>

            @error('alamat')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Tombol Aksi Kiri & Kanan -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-gray-50">
            <!-- Sisi Kiri: Tombol Pemicu Modal Hapus -->
            <button type="button" 
                    onclick="toggleModal('delete-modal', true)"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-sm px-5 py-2.5 rounded-xl transition-all duration-200 order-last sm:order-first">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v4M4 7h16" />
                </svg>
                Hapus Daerah
            </button>

            <!-- Sisi Kanan: Kembali & Simpan -->
            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <a href="{{ route('daerah.index') }}"
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

<!-- Form Tersembunyi untuk Proses Hapus Data -->
<form id="real-delete-form" action="{{ route('daerah.destroy', $daerah->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<!-- MODAL PREMIUM POP-UP (CONFIRMATION) -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
    <!-- Backdrop Blur Gelap -->
    <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="toggleModal('delete-modal', false)"></div>

    <!-- Konten Box Modal -->
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-gray-100 p-6 transform transition-all scale-95 duration-300 opacity-100 z-10">
        <div class="text-center">
            <!-- Lingkaran Icon Warning -->
            <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-rose-50 text-rose-600 mb-4">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 tracking-tight">Hapus Data Daerah?</h3>
            <p class="text-sm text-gray-500 mt-2 px-2">
                Apakah Anda yakin ingin menghapus <span class="font-semibold text-gray-800">"{{ $daerah->nama }}"</span>? Tindakan ini tidak dapat dibatalkan dan semua data terkait wilayah ini akan hilang.
            </p>
        </div>
        
        <!-- Aksi di dalam Modal -->
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

<!-- JavaScript Ringan untuk Kendali Pop-up -->
<script>
    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden'); // Kunci scroll halaman belakang
        } else {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); // Lepas kunci scroll
        }
    }
</script>

@endsection
