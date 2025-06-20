<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">Daftar Mobil</h1>

    <!-- Tombol tambah mobil -->
    <div class="flex justify-end mb-4">
        <button data-modal-target="inputMobilModal" data-modal-toggle="inputMobilModal"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Mobil
        </button>
    </div>

    <!-- Tabel daftar mobil -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto border-collapse">
            <thead>
            <tr class="bg-gray-200 text-gray-700 text-left">
                <th class="px-6 py-3 border-b">No</th>
                <th class="px-6 py-3 border-b">Merek Mobil</th>
                <th class="px-6 py-3 border-b">Jenis Mobil</th>
                <th class="px-6 py-3 border-b">Harga</th>
                <th class="px-6 py-3 border-b">Aksi</th>
            </tr>
            </thead>
            <tbody class="text-gray-600">
            @foreach ($mobil as $index => $item)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 border-b">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 border-b">{{ $item->Merek_Mobil }}</td>
                    <td class="px-6 py-4 border-b">{{ $item->Jenis_Mobil }}</td>
                    <td class="px-6 py-4 border-b">Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 border-b">
                        <div class="flex space-x-2">
                            <!-- Tombol Edit -->
                            <button data-modal-target="editMobilModal-{{ $item->kode_mobil }}" data-modal-toggle="editMobilModal-{{ $item->kode_mobil }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm font-semibold">
                                Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('mobil.delete', $item->kode_mobil) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal Edit Harus di Dalam Loop -->
                <div id="editMobilModal-{{ $item->kode_mobil }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Mobil</h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="editMobilModal-{{ $item->kode_mobil }}">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1l12 12M13 1L1 13" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <!-- Modal Form -->
                            <form action="{{ route('mobil.update', $item->kode_mobil) }}" method="POST" class="p-6 space-y-6">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Merek Mobil</label>
                                    <input type="text" name="Merek_Mobil" value="{{ $item->Merek_Mobil }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jenis Mobil</label>
                                    <input type="text" name="Jenis_Mobil" value="{{ $item->Jenis_Mobil }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                                    <input type="number" name="Harga" value="{{ $item->Harga }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                <div class="flex justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="editMobilModal-{{ $item->kode_mobil }}" type="button"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

    <!-- Modal Tambah Mobil -->
    <div id="inputMobilModal" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Mobil</h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="inputMobilModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M1 1l12 12M13 1L1 13"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('mobil.simpan') }}" class="p-6 space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Merek Mobil</label>
                        <input type="text" name="Merek_Mobil" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Mobil</label>
                        <input type="text" name="Jenis_Mobil" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="Harga" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="inputMobilModal" type="button"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
