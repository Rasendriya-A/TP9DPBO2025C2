# Tugas Praktikum 9

## Janji
Saya Rasendriya Andhika dengan NIM 2305309 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Aplikasi Manajemen Mahasiswa (MVP)
Sebuah aplikasi berbasis web yang dikembangkan dengan bahasa pemrograman PHP menggunakan pola arsitektur Model-View-Presenter (MVP). Aplikasi ini digunakan untuk mengelola data mahasiswa, meliputi penambahan, pengubahan, penghapusan, dan penampilan daftar mahasiswa.

## Desain Program
### 1. TabelMahasiswa.class.php (Model)
Class ini bertanggung jawab dalam:
- Membuka dan menutup koneksi ke database
- Mengeksekusi query SQL (INSERT, SELECT, UPDATE, DELETE)
Menyediakan method seperti:
- getMahasiswa() untuk mengambil semua data
- addMahasiswa() untuk menambah data baru
- updateMahasiswa() untuk mengubah data
- deleteMahasiswa() untuk menghapus data

### 2. ProsesMahasiswa.php (Presenter)
Class yang menjembatani antara View dan Model, bertugas:
- Menginisialisasi model (TabelMahasiswa)
- Memanggil method sesuai aksi pengguna:
  - tambahMahasiswa()
  - ubahMahasiswa()
  - hapusMahasiswa()
- Mengatur alur logika dan meneruskan hasil ke View

### 3. Views (Folder view/)
Folder ini berisi file tampilan pengguna:
- TampilMahasiswa.php
Menampilkan seluruh data mahasiswa dalam bentuk tabel

- TambahMahasiswa.php
Menyediakan form untuk menambah mahasiswa baru

- UbahMahasiswa.php
Menyediakan form untuk mengedit data mahasiswa

- HapusMahasiswa.php
Menangani proses penghapusan data berdasarkan ID mahasiswa

### 4. index.php (Router Utama)
- Menerima parameter page dari URL
- Memuat View yang sesuai:
  - tambah untuk form tambah mahasiswa
  - ubah untuk form ubah data
  - hapus untuk proses hapus data
  - default (kosong atau tidak dikenali) akan menampilkan daftar mahasiswa

## Penjelasan Alur
### 1. Inisialisasi Aplikasi
- Pengguna mengakses index.php
- Aplikasi akan mengecek parameter page untuk menentukan tampilan yang ditampilkan

### 2. Menambahkan Mahasiswa
- Pengguna klik tombol tambah, diarahkan ke TambahMahasiswa.php
- Setelah mengisi form, data dikirim ke presenter (ProsesMahasiswa.php)
- Data diteruskan ke model dan ditambahkan ke database

### 3. Mengubah Data Mahasiswa
- Pengguna klik tombol ubah, diarahkan ke UbahMahasiswa.php dengan parameter ID
- Data awal di-load dan ditampilkan dalam form
- Setelah disimpan, presenter mengirim data ke model untuk di-update

### 4. Menghapus Mahasiswa
- Pengguna klik tombol hapus, diarahkan ke HapusMahasiswa.php dengan parameter ID
- Presenter memanggil method hapusMahasiswa() untuk menghapus data dari database
- Setelah berhasil, pengguna kembali ke halaman utama dengan notifikasi

### 5. Menampilkan Daftar Mahasiswa
- View TampilMahasiswa.php mengambil seluruh data mahasiswa melalui presenter
- Data ditampilkan dalam bentuk tabel lengkap dengan tombol aksi (ubah & hapus)

## Dokumentasi
https://github.com/user-attachments/assets/7ed48bd5-b475-4145-9882-4c2650da6be9

