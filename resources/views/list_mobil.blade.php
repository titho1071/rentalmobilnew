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
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach ($mobil as $index => $item)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 border-b">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 border-b">{{ $item->Merek_Mobil }}</td>
                            <td class="px-6 py-4 border-b">{{ $item->Jenis_Mobil }}</td>
                            <td class="px-6 py-4 border-b">Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Mobil -->
        <div id="inputMobilModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Mobil
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="inputMobilModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1l12 12M13 1L1 13" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form method="POST" action="{{ route('mobil.simpan') }}" class="p-6 space-y-6">
                        @csrf
                        <div>
                            <label for="Merek_Mobil" class="block text-sm font-medium text-gray-700">Merek Mobil</label>
                            <input type="text" id="Merek_Mobil" name="Merek_Mobil"
                                class="mt-1 block w-full rounded-md border-gray-500 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="Jenis_Mobil" class="block text-sm font-medium text-gray-700">Jenis Mobil</label>
                            <input id="Jenis_Mobil" name="Jenis_Mobil"
                                class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="Harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" id="Harga" name="Harga"
                                class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <!-- Modal footer -->
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
