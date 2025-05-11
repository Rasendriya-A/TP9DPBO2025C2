<?php

include("KontrakPresenter.php");

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setTelp($row['telp']); // mengisi Telp
				$mahasiswa->setEmail($row['email']); // mengisi Email

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	// Tambah data mahasiswa
	function tambahMahasiswa($nim, $nama, $tempat, $tl, $gender, $telp, $email)
	{
		try {
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $telp, $email);
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Gagal menambah data: " . $e->getMessage();
		}
	}

	// Update data mahasiswa
	function ubahMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $telp, $email)
	{
		try {
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $telp, $email);
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Gagal mengubah data: " . $e->getMessage();
		}
	}

	// Hapus data mahasiswa
	function hapusMahasiswa($id)
	{
		try {
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->deleteMahasiswa($id);
			$this->tabelmahasiswa->close();
			return true;
		} catch (Exception $e) {
			echo "Gagal menghapus data: " . $e->getMessage();
		}
	}

	// Menambahkan metode untuk mendapatkan data mahasiswa berdasarkan ID
	function getMahasiswa($id)
	{
		try {
			// Validasi jika $id adalah angka
			if (!is_numeric($id)) {
				throw new Exception("ID harus berupa angka.");
			}

			// Membuka koneksi
			$this->tabelmahasiswa->open();
			
			// Menjalankan query langsung tanpa prepare (menggunakan MySQLi)
			$query = "SELECT * FROM mahasiswa WHERE id = $id"; // Query langsung (perhatikan risiko SQL Injection)
			
			// Eksekusi query
			$result = $this->tabelmahasiswa->execute($query); 
			
			// Mengambil hasil query
			$row = $this->tabelmahasiswa->getResult();  // Mengambil hasil dalam bentuk array

			// Jika data ditemukan, buat objek Mahasiswa dan kembalikan
			if ($row) {
				$mahasiswa = new Mahasiswa();
				$mahasiswa->setId($row['id']);
				$mahasiswa->setNim($row['nim']);
				$mahasiswa->setNama($row['nama']);
				$mahasiswa->setTempat($row['tempat']);
				$mahasiswa->setTl($row['tl']);
				$mahasiswa->setGender($row['gender']);
				$mahasiswa->setTelp($row['telp']);
				$mahasiswa->setEmail($row['email']);
				
				// Menutup koneksi
				$this->tabelmahasiswa->close();
				return $mahasiswa;
			} else {
				// Menutup koneksi
				$this->tabelmahasiswa->close();
				return null; // Jika data tidak ditemukan
			}
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
			return null;
		}
	}

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getTelp($i)
	{
		// mengembalikan telp mahasiswa dengan indeks ke i
		return $this->data[$i]->telp;
	}
	function getEmail($i)
	{
		// mengembalikan email mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
