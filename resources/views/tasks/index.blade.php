<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Tugas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('tasks.create') }}" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                    + Tambah Tugas
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deadline</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->deadline }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($task->is_completed)
                                        <span class="text-green-600 font-semibold">Selesai</span>
                                    @else
                                        <span class="text-yellow-600 font-semibold">Belum</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-black text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    {{-- Form Tandai Selesai --}}
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                                        <button class="bg-black text-white px-3 py-1 rounded">
                                            {{ $task->is_completed ? 'Batalkan' : 'Selesai' }}
                                        </button>
                                    </form>

                                    {{-- Form Hapus --}}
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-black text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    Belum ada tugas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
