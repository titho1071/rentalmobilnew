<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Daftar Mobil</h1>

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
                            <td class="px-6 py-4 border-b">Rp {{$item->Harga, 0, ',', '.' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
