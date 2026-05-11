<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Equipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.equipments.update', $equipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Nama Peralatan</label>
                        <input type="text" name="nama_peralatan" class="form-control" value="{{ old('nama_peralatan', $equipment->nama_peralatan) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $equipment->kategori) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Kondisi</label>
                        <select name="kondisi" class="form-select" required>
                            <option value="baik" {{ $equipment->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak_ringan" {{ $equipment->kondisi == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="rusak_berat" {{ $equipment->kondisi == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="tersedia" {{ $equipment->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="dipinjam" {{ $equipment->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="maintenance" {{ $equipment->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $equipment->jumlah) }}" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.equipments.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
