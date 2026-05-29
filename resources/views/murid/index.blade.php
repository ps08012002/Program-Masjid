@extends('layouts.admin')

@section('content')

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
            Data Murid
        </h1>
        <p class="text-sm text-gray-500 mt-1">Kelola informasi profil, foto, dan penempatan kelas santri/murid.</p>
    </div>

    <a href="{{ route('murid.create') }}"
       class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-semibold px-5 py-2.5 rounded-xl hover:from-teal-500 hover:to-emerald-400 focus:ring-4 focus:ring-teal-500/30 shadow-md transform hover:-translate-y-0.5 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m4 5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
        </svg>
        Tambah Murid
    </a>
</div>

@if(session('success'))
    <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 px-4 py-3 rounded-xl flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-2.5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
@endif

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-teal-50/50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider w-20">No</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider w-24">Foto</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider">Nama Murid</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-teal-800 tracking-wider">Kelas</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold text-teal-800 tracking-wider w-40">Aksi</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-50">
                @forelse($murid as $item)
                    <tr class="hover:bg-teal-50/20 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm font-medium text-gray-500">
                            {{ $loop->iteration }}
                        </td>
                        
                        <td class="px-6 py-4">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}"
                                     class="w-12 h-12 object-cover rounded-full ring-2 ring-teal-500/20 shadow-sm">
                            @else
                                <div class="w-12 h-12 rounded-full bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">
                            {{ $item->nama }}
                        </td>
                        
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-lg text-xs font-medium border border-emerald-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.168.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                {{ $item->kelas->nama }}
                            </span>
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('murid.edit', $item->id) }}"
                                   class="inline-flex items-center gap-1 bg-amber-50 hover:bg-amber-100 text-amber-700 px-3 py-1.5 rounded-xl text-xs font-semibold transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>

                                <button type="button"
                                        onclick="openDeleteModal('{{ $item->id }}', '{{ addslashes($item->nama) }}')"
                                        class="inline-flex items-center gap-1 bg-rose-50 hover:bg-rose-100 text-rose-700 px-3 py-1.5 rounded-xl text-xs font-semibold transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v4M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="text-sm font-medium">Data murid belum tersedia</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $murid->links() }}
</div>

<form id="global-delete-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
    <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>

    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-gray-100 p-6 transform transition-all scale-95 duration-300 opacity-100 z-10">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-rose-50 text-rose-600 mb-4">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 tracking-tight">Hapus Data Murid?</h3>
            <p class="text-sm text-gray-500 mt-2 px-2">
                Apakah Anda yakin ingin menghapus murid bernama <span id="modal-item-name" class="font-semibold text-gray-800"></span>? Seluruh data riwayat absensi dan penilaian akademik murid ini akan terhapus secara permanen.
            </p>
        </div>
        
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <button type="button" 
                    onclick="closeDeleteModal()"
                    class="w-full inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold px-4 py-3 rounded-xl text-sm transition-all">
                Batal
            </button>
            <button type="button" 
                    onclick="submitDeleteForm()"
                    class="w-full inline-flex items-center justify-center bg-gradient-to-r from-rose-600 to-red-500 hover:from-rose-500 hover:to-red-400 text-white font-semibold px-4 py-3 rounded-xl text-sm shadow-md transition-all">
                Ya, Hapus Data
            </button>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id, name) {
        const modal = document.getElementById('delete-modal');
        const itemNameSpan = document.getElementById('modal-item-name');
        const deleteForm = document.getElementById('global-delete-form');
        
        // 1. Sematkan nama murid ke dalam teks konfirmasi modal
        itemNameSpan.textContent = `"${name}"`;
        
        // 2. Buat URL endpoint destroy secara dinamis berdasarkan ID target
        let routePattern = "{{ route('murid.destroy', ':id') }}";
        deleteForm.action = routePattern.replace(':id', id);
        
        // 3. Munculkan Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function submitDeleteForm() {
        document.getElementById('global-delete-form').submit();
    }
</script>

@endsection