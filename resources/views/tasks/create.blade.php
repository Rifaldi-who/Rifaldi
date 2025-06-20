<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tugas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Judul Tugas</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Deskripsi</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Tanggal Deadline</label>
                    <input type="date" name="deadline" class="w-full border rounded px-3 py-2">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
