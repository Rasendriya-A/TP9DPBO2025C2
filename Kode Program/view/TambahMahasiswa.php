<?php

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");
require_once("model/Template.class.php");

class TambahMahasiswa implements KontrakView
{
    private $prosesmahasiswa;

    function __construct()
    {
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tanggal = $_POST['tanggal'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];

            $this->prosesmahasiswa->tambahMahasiswa($nim, $nama, $tempat, $tanggal, $gender, $telp, $email);

            header("Location: index.php");
            exit;
        }

        // Variabel form kosong untuk input awal
        $form = '
        <h3 class="text-center mb-4">Tambah Mahasiswa</h3>
        <form method="POST">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempat" name="tempat" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Pilih Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telp">No Telepon:</label>
                <input type="text" class="form-control" id="telp" name="telp" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
        ';

        // Load template form.html dan ganti placeholder
        $template = new Template("templates/form.html");
        $template->replace("FORM_MAHASISWA", $form);
        $template->write();
    }
}
