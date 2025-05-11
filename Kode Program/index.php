<?php

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'tambah':
        include("view/TambahMahasiswa.php");
        $add = new TambahMahasiswa();
        $add->tampil();
        break;

    case 'ubah':
        include("view/UbahMahasiswa.php");
        $edit = new UbahMahasiswa();
        $edit->tampil();
        break;
        
    case 'hapus':
        // Mengambil ID mahasiswa yang akan dihapus
        if (isset($_GET['id'])) {
            include("view/HapusMahasiswa.php");
            $hapus = new HapusMahasiswa();
            $hapus->hapusData($_GET['id']); // Panggil metode hapusData untuk menghapus mahasiswa berdasarkan ID
        } else {
            echo "ID tidak ditemukan.";
        }
        break;

    default:
        include("view/TampilMahasiswa.php");
        $tp = new TampilMahasiswa();
        $tp->tampil();
        break;
}
