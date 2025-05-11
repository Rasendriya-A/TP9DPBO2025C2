<?php

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
    // Ambil semua data mahasiswa
    function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->execute($query);
    }

    // Ambil satu data mahasiswa berdasarkan ID
    function getMahasiswaById($id)
    {
        // Menulis query langsung tanpa menggunakan prepare() dan bind_param
        $query = "SELECT * FROM mahasiswa WHERE id = $id";  // Menjalankan query langsung

        // Eksekusi query
        $result = $this->execute($query);

        // Mengambil hasil pertama (asumsi ID unik)
        return $this->getResult();
    }

    // Tambah data mahasiswa baru
    function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $telp, $email)
    {
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, telp, email)
                  VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$telp', '$email')";
        return $this->execute($query);
    }

    // Update data mahasiswa
    function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $telp, $email)
    {
        $query = "UPDATE mahasiswa SET 
                    nim = '$nim',
                    nama = '$nama',
                    tempat = '$tempat',
                    tl = '$tl',
                    gender = '$gender',
                    telp = '$telp',
                    email = '$email'
                  WHERE id = $id";
        return $this->execute($query);
    }

    // Hapus data mahasiswa
    function deleteMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        return $this->execute($query);
    }
}
