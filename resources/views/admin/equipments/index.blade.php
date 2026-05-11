<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipment Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between mb-3">
                    <form action="{{ route('admin.equipments.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control" placeholder="Cari peralatan..." value="{{ request('search') }}">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <a href="{{ route('admin.equipments.create') }}" class="btn btn-success">Tambah Equipment</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipments as $eq)
                            <tr>
                                <td>{{ $loop->iteration + $equipments->firstItem() - 1 }}</td>
                                <td>{{ $eq->nama_peralatan }}</td>
                                <td>{{ $eq->kategori }}</td>
                                <td>{{ $eq->kondisi }}</td>
                                <td>
                                    <span class="badge bg-{{ $eq->status == 'tersedia' ? 'success' : ($eq->status == 'dipinjam' ? 'warning' : 'danger') }}">
                                        {{ $eq->status }}
                                    </span>
                                </td>
                                <td>{{ $eq->jumlah }}</td>
                                <td>
                                    <a href="{{ route('admin.equipments.edit', $eq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.equipments.destroy', $eq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $equipments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
