<?php

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");
require_once("model/Template.class.php");

class UbahMahasiswa implements KontrakView
{
    private $prosesmahasiswa;

    function __construct()
    {
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        // Cek apakah ada parameter ID di URL untuk mengambil data mahasiswa yang akan diubah
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mahasiswa = $this->prosesmahasiswa->getMahasiswa($id); // Ambil data mahasiswa dari database
        } else {
            // Jika tidak ada ID, redirect ke halaman utama
            header("Location: index.php");
            exit;
        }

        // Jika form disubmit untuk update
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tanggal = $_POST['tanggal'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];

            // Update data mahasiswa
            $this->prosesmahasiswa->ubahMahasiswa($id, $nim, $nama, $tempat, $tanggal, $gender, $telp, $email);

            // Redirect setelah update
            header("Location: index.php");
            exit;
        }

        // Variabel form dengan data mahasiswa yang sudah ada untuk form update
        $form = '
        <h3 class="text-center mb-4">Ubah Mahasiswa</h3>
        <form method="POST">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="' . $mahasiswa->getNim() . '" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="' . $mahasiswa->getNama() . '" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="' . $mahasiswa->getTempat() . '" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="' . $mahasiswa->getTl() . '" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki" ' . ($mahasiswa->getGender() == 'Laki-laki' ? 'selected' : '') . '>Laki-laki</option>
                    <option value="Perempuan" ' . ($mahasiswa->getGender() == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="' . $mahasiswa->getEmail() . '" required>
            </div>
            <div class="form-group">
                <label for="telp">No Telepon:</label>
                <input type="text" class="form-control" id="telp" name="telp" value="' . $mahasiswa->getTelp() . '" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
        ';

        // Load template form.html dan ganti placeholder
        $template = new Template("templates/form.html");
        $template->replace("FORM_MAHASISWA", $form);
        $template->write();
    }
}
