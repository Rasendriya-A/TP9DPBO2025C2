<?php

// Include presenter
include_once("presenter/ProsesMahasiswa.php");

class HapusMahasiswa
{
    private $presenter;

    public function __construct()
    {
        $this->presenter = new ProsesMahasiswa();
    }

    public function hapusData($id)
    {
        // Panggil presenter untuk hapus data
        $result = $this->presenter->hapusMahasiswa($id);

        // Redirect atau tampilkan pesan
        if ($result == true){
            echo "<script>alert('Data berhasil dihapus!'); document.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data.'); document.location.href = 'index.php';</script>";
        }
    }
}
