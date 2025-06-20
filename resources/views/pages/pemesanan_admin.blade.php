@extends('layouts.appadmin')

@section('title', 'pemesanan_admin')

@section('content')
<div class="pt-10">
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Pemesanan</h3>
    <table class="w-full min-w-[800px] border border-gray-300 text-center">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 border">NO</th>
          <th class="p-3 border">ID PENYEWAAN</th>
          <th class="p-3 border">NAMA PENYEWA</th>
          <th class="p-3 border">KODE MOBIL</th>
          <th class="p-3 border">EMAIL</th>
          <th class="p-3 border">ALAMAT</th>
          <th class="p-3 border">NO TELEPON</th>
          <th class="p-3 border">TANGGAL PENGAMBILAN</th>
          <th class="p-3 border">TANGGAL PENGEMBALIAN</th>
          <th class="p-3 border">TEMPAT</th>
          <th class="p-3 border">NOREK</th>
          <th class="p-3 border">TOTAL</th>
          <th class="p-3 border">BUKTI</th>
          <th class="p-3 border">STATUS</th>
          <th class="p-3 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pemesanan as $index => $item)
        <tr>
          <td class="p-3 border">{{ $index + 1 }}</td>
          <td class="p-3 border">{{ $item->id_penyewaan }}</td>
          <td class="p-3 border">{{ $item->nama_penyewa }}</td>
          <td class="p-3 border">{{ $item->kode_mobil }}</td>
          <td class="p-3 border">{{ $item->email }}</td>
          <td class="p-3 border">{{ $item->alamat }}</td>
          <td class="p-3 border">{{ $item->no_telepon }}</td>
          <td class="p-3 border">{{ $item->tanggal_pengambilan }}</td>
          <td class="p-3 border">{{ $item->tanggal_pengembalian }}</td>
          <td class="p-3 border">{{ $item->alamat_pengambilan }}</td>
          <td class="p-3 border">{{ $item->no_rekening_penjual }}</td>
          <td class="p-3 border">Rp {{ number_format($item->total_pembayaran, 0, ',', '.') }}</td>
          <td>
            <img src="{{ asset('images/buktibyr.jpg') }}" alt="bukti" class="max-w-[150px] h-auto mx-auto">
          </td>
          <td class="p-3 border">
            @if ($item->status == 'Konfirmasi')
              <span class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-sm font-medium text-green-800">Konfirmasi</span>
            @elseif ($item->status == 'Menunggu')
              <span class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-sm font-medium text-yellow-800">Menunggu</span>
            @else ($item->status == 'Batal')
              <span class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-sm font-medium text-red-800">Batal</span>
            @endif
          </td>

          <td class="p-3 border">
            <div class="flex gap-2 justify-center">
              <button data-modal-target="EditPemesananModal{{ $item->id_penyewaan }}" data-modal-toggle="EditPemesananModal{{ $item->id_penyewaan }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Edit</button>
              <button class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Hapus</button>
            </div>
          </td>
        </tr>
              <!-- Modal Edit Pemesanan -->
        <div id="EditPemesananModal{{ $item->id_penyewaan }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">Formulir Pemesanan</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="EditPemesananModal{{ $item->id_penyewaan }}">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6">
                      <form action="{{ route('pemesanan.update', $item->id_penyewaan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1">
                          <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pemesanan</label>
                            <select id="status" name="status" required
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option value="Konfirmasi" {{ $item->status == 'Konfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                              <option value="Menunggu" {{ $item->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                              <option value="Batal" {{ $item->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                          </div>
                          <!-- Modal footer -->
                          <div class="flex justify-end pt-4 space-x-2 border-t border-gray-200 rounded-b">
                              <button data-modal-hide="EditPemesananModal{{ $item->id_penyewaan }}" type="button"
                                  class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                  Batal
                              </button>
                              <button type="submit"
                                  class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                  Simpan
                              </button>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

