<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $bk)
                            <tr>
                                <td>{{ $loop->iteration + $bookings->firstItem() - 1 }}</td>
                                <td>{{ optional($bk->user)->name }}</td>
                                <td>{{ $bk->nama_ruangan }}</td>
                                <td>{{ $bk->tanggal->format('Y-m-d') }}</td>
                                <td>{{ $bk->jam_mulai }}</td>
                                <td>{{ $bk->jam_selesai }}</td>
                                <td>
                                    <span class="badge bg-{{ $bk->status == 'approved' || $bk->status == 'selesai' ? 'success' : ($bk->status == 'pending' ? 'warning' : 'danger') }}">
                                        {{ $bk->status }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.bookings.updateStatus', $bk->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline w-auto">
                                            <option value="pending" {{ $bk->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $bk->status == 'approved' ? 'selected' : '' }}>Approve</option>
                                            <option value="rejected" {{ $bk->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                                            <option value="selesai" {{ $bk->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
