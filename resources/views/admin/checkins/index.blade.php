<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkin History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Equipment</th>
                                <th>Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checkins as $ci)
                            <tr>
                                <td>{{ $loop->iteration + $checkins->firstItem() - 1 }}</td>
                                <td>{{ optional($ci->user)->name }}</td>
                                <td>{{ optional($ci->equipment)->nama_peralatan }}</td>
                                <td>{{ $ci->waktu_checkin ? $ci->waktu_checkin->format('Y-m-d H:i') : '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $ci->status == 'checked_in' ? 'success' : 'warning' }}">
                                        {{ $ci->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $checkins->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
