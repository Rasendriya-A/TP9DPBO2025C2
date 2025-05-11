<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Mahasiswa.class.php");
include("model/TabelMahasiswa.class.php");

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	function tambahMahasiswa($nim, $nama, $tempat, $tl, $gender, $telp, $email);
	function ubahMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $telp, $email);
	function hapusMahasiswa($id);
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
}