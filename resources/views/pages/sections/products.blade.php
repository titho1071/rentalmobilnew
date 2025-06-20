<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VROOM - Rental Mobil</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom z-index for modal to appear above navbar */
    #order-modal {
      z-index: 1000 !important;
    }
    #detail-modal {
      z-index: 1000 !important;
    }
    /* Custom carousel button styling */
    .carousel-button {
      background-color: #4b5563 !important; /* gray-600 */
      color: white !important;
    }
    .carousel-button:hover {
      background-color: #1e40af !important; /* blue-800 */
    }
  </style>
</head>
<body class="bg-white">
  <!-- Navbar (example) -->
  <nav class="bg-white border-gray-200 fixed w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-900">VROOM</span>
      </a>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
          <li>
            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Produk</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Tentang Kami</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Product Section (with padding-top to account for fixed navbar) -->
  <section id="Produk" class="py-24 px-6 text-center bg-[#F9FAFF]">
    <h2 class="text-[28px] text-[#1e2b5c] font-bold mb-8">PRODUK</h2>

    <div class="relative max-w-[1300px] mx-auto">
      <div id="products-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-[420px] overflow-hidden rounded-lg">
          <!-- Slide 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4">
              <!-- Product 1 -->
              <div class="border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
                <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
                <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
                <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
                <div class="flex justify-center space-x-2">
                  <button data-modal-target="detail-modal" data-modal-toggle="detail-modal" onclick="showDetailPopup(0)" class="px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</button>
                  <button data-modal-target="order-modal" data-modal-toggle="order-modal" onclick="setSelectedCar('Toyota Raize')" class="px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</button>
                </div>
              </div>
        
        <!-- Navigation buttons with custom styling -->
        <button type="button" class="absolute top-1/2 -left-4 z-30 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full carousel-button" data-carousel-prev>
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </button>
        <button type="button" class="absolute top-1/2 -right-4 z-30 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full carousel-button" data-carousel-next>
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- Detail Modal -->
  <div id="detail-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-gradient-to-r from-[#115EAD] to-[#219FE3] text-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b border-[#219FE3] rounded-t">
          <h3 class="text-xl font-bold">DETAIL PRODUK</h3>
          <button type="button" class="text-white bg-transparent hover:bg-[#219FE3] rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="detail-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-4 text-center">
          <div class="flex justify-center">
            <img id="popupCarImage" src="" alt="Car Image" class="max-w-[150px] h-auto rounded-lg border-2 border-white">
          </div>
          <h3 id="popupCarBrand" class="text-lg font-bold"></h3>
          <p id="popupCarModel" class="text-lg font-bold"></p>
          <p id="popupCarTransmission" class="text-sm opacity-80"></p>
          <p class="font-semibold">Spesifikasi</p>
          <div class="flex justify-around text-sm">
            <div class="flex flex-col items-center space-y-1">
              <div class="w-6 h-6">
                <svg viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5325 7.27899C4.7775 5.99895 4.3485 3.51887 5.577 1.69881C6.8055 -0.101247 9.243 -0.541262 11.0175 0.71878C12.7725 1.99882 13.2015 4.4789 11.973 6.29896C10.725 8.09902 8.307 8.53904 6.5325 7.27899ZM27.3 33.9999H13.5135C10.6275 33.9999 8.1705 31.8398 7.7415 28.9197L3.9 9.99908H0L3.8805 29.5197C4.6215 34.3999 8.7165 38 13.533 38H27.3V33.9999ZM27.7485 25.9996H18.2325L16.224 17.7993C19.305 19.5794 22.62 20.8794 26.2665 20.2394V15.9793C23.088 16.5993 19.5585 15.4393 17.121 13.4792L13.923 10.9391C13.4745 10.5791 12.9675 10.3391 12.441 10.1791C11.817 9.99908 11.154 9.93908 10.5105 10.0591H10.4715C8.073 10.4991 6.474 12.8392 6.8835 15.2793L9.516 27.1196C10.062 29.9597 12.4605 31.9998 15.2685 31.9998H28.626L36.075 38L39 34.9999L27.7485 25.9996Z" fill="white"/>
                </svg>
              </div>
              <span id="popupCarSeats"></span>
            </div>
            <div class="flex flex-col items-center space-y-1">
              <div class="w-6 h-6">
                <svg viewBox="0 0 60 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip1)">
                    <path d="M47.5 6.81818H37.5C36.1739 6.81818 34.9021 7.29707 33.9645 8.14951C33.0268 9.00195 32.5 10.1581 32.5 11.3636V38.6364C32.5 41.0474 33.5536 43.3597 35.4289 45.0646C37.3043 46.7695 39.8478 47.7273 42.5 47.7273C45.1522 47.7273 47.6957 46.7695 49.5711 45.0646C51.4464 43.3597 52.5 41.0474 52.5 38.6364V11.3636C52.5 10.1581 51.9732 9.00195 51.0355 8.14951C50.0979 7.29707 48.8261 6.81818 47.5 6.81818Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M32.5 16.7046L27.5 12.1592C26.5623 11.307 25.2908 10.8283 23.9649 10.8283C22.6391 10.8283 21.3676 11.307 20.4299 12.1592L13.3599 18.5864C12.4226 19.4388 11.896 20.5948 11.896 21.8001C11.896 23.0054 12.4226 24.1613 13.3599 25.0137L35.8599 45.4683" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.0229 29.0909H12.2729C10.9469 29.0909 9.6751 29.5698 8.73742 30.4222C7.79973 31.2747 7.27295 32.4308 7.27295 33.6364V42.7273C7.27295 43.9328 7.79973 45.089 8.73742 45.9414C9.6751 46.7938 10.9469 47.2727 12.2729 47.2727H42.2729" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42.5 38.6364V38.6591" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs><clipPath id="clip1"><rect width="60" height="54.5455" fill="white"/></clipPath></defs>
                </svg>
              </div>
              <span id="popupCarColor"></span>
            </div>
            <div class="flex flex-col items-center space-y-1">
              <div class="w-6 h-6">
                <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                    <path d="M3.75 25.3125V40.3125" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M23.4375 7.5H38.4375" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M52.5 41.25L43.6734 50.0766C43.3221 50.4275 42.8458 50.6248 42.3492 50.625H24.2133C23.7167 50.6248 23.2404 50.4275 22.8891 50.0766L13.6734 40.8609C13.3225 40.5096 13.1252 40.0333 13.125 39.5367V18.75C13.125 18.2527 13.3225 17.7758 13.6742 17.4242C14.0258 17.0725 14.5027 16.875 15 16.875H42.3492C42.8458 16.8752 43.3221 17.0725 43.6734 17.4234L52.5 26.25H56.25C56.7473 26.25 57.2242 26.4475 57.5758 26.7992C57.9275 27.1508 58.125 27.6277 58.125 28.125V39.375C58.125 39.8723 57.9275 40.3492 57.5758 40.7008C57.2242 41.0525 56.7473 41.25 56.25 41.25H52.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.75 32.8125H13.125" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30.9375 7.5V16.875" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs><clipPath id="clip0"><rect width="60" height="60" fill="white"/></clipPath></defs>
                </svg>
              </div>
              <span id="popupCarEngine"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Order Modal -->
  <div id="order-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">Formulir Pemesanan</h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="order-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6">
          <form action="{{ route('pemesanan.tambah') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
            <!-- Mobil -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Mobil</label>
              <select name="kode_mobil" id="selected-car" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg ...">
                <option selected>PILIH</option>
                <option value="Toyota Raize">Toyota Raize</option>
              </select>
            </div>

            <!-- Date inputs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- Tanggal Pengambilan -->
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pengambilan</label>
                <input name="tanggal_pengambilan" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>

              <!-- Tanggal Pengembalian -->
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pengembalian</label>
                <input name="tanggal_pengembalian" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>
            </div>

            <!-- Nama Lengkap -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
              <input name="nama_penyewa" type="text" placeholder="Masukkan nama lengkap Anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <!-- Email -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
              <input name="email" type="email" placeholder="Masukkan alamat email akun Anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <!-- Alamat -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
              <input name="alamat" type="text" placeholder="Masukkan alamat Anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <!-- Nomor Handphone -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Nomor Handphone</label>
              <input name="no_telepon" type="tel" placeholder="Masukkan nomor telepon Anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <!-- Foto KTP -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Foto KTP</label>
              <input name="foto_ktp" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
              <p class="mt-1 text-sm text-gray-500">Unggah foto KTP Anda (JPEG, PNG, atau PDF)</p>
            </div>

            <!-- Titik Penjemputan -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Pengambilan</label>
              <input name="alamat_pengambilan" type="text" value="Tiban Indah Permai Blok Z1" readonly class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <!-- Payment information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- Total Pembayaran -->
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Total Pembayaran</label>
                <input name="total_pembayaran" type="text" value="Rp. 500.000" readonly class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>

              <!-- Nomor Rekening -->
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Nomor Rekening</label>
                <input name="no_rekening_penjual"type="text" value="3244657545346 (BNI) a/n VROOM" readonly class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>
            </div>

            <!-- Bukti Pembayaran -->
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">Bukti Pembayaran</label>
              <input name="foto_bukti_bayar" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
              <p class="mt-1 text-sm text-gray-500">Unggah bukti transfer pembayaran Anda</p>
            </div>
            <!-- Tombol Sewa -->
            <button type="submit" class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
              Sewa
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <script>
  // Car details data

  // Function to show product details in modal
  function showDetailPopup(index) {
    const detail = carDetails[index];
    document.getElementById('popupCarImage').src = detail.image;
    document.getElementById('popupCarBrand').textContent = detail.brand;
    document.getElementById('popupCarModel').textContent = detail.model;
    document.getElementById('popupCarTransmission').textContent = detail.transmission;
    document.getElementById('popupCarSeats').textContent = detail.seats;
    document.getElementById('popupCarColor').textContent = detail.color;
    document.getElementById('popupCarEngine').textContent = detail.engine;
  }

  // Function to set selected car in order form
  function setSelectedCar(carName) {
    const selectElement = document.getElementById('selected-car');
    selectElement.value = carName;
  }
  </script>
</body>
</html>