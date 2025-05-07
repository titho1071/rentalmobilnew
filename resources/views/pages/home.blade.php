@extends ('layouts.app') 

@section('title', 'Home') 
@section('page_title', 'Selamat datang di website sewa mobil') 

@section('content') 
<h1 class="text-2x1 font-bold mb-4">Selamat Pagi</h1> 
<p class="mb-4">Berikut ini daftar mobil yang disewa</p> 

@include('components.card', [ 
'imgsrc' => 'images/Logo 6.png', 
'title' => 'VROOM', 
'desc' => 'Aplikasi Reservasi dan Pemesanan Mobil Berbasis Web merupakan sebuah platform digital yang di rancang untuk memudahkan proses pencarian, pemesanan dan pengelolaan kendaraan secara daring. Aplikasi ini memungkinkan penyewa untuk melakukan reservasi mobil tanpa harus datang langsung ke tempat penyedia layanan. Aplikasi ini memiliki dua jenis pengguna utama, yaitu penyewa dan penjual. Penyewa dapat mencari mobil yang tersedia, melihat detail informasi, serta melakukan pemesanan sesuai kebutuhan. Sedangkan penjual berperan dalam mengelola data mobil, merespon pemesanan, serta mengatur transaksi.
' 
]) 
@endsection