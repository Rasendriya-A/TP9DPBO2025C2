<?php

// Kelas yang menggambarkan detail sebuah mahasiswa dengan atribut-atributnya
class Mahasiswa
{
	var $id = '';
	var $nim = '';
	var $nama = '';
	var $tempat = '';
	var $tl = '';
	var $gender = '';
	var $telp = '';
	var $email = '';

	function __construct($id = '', $nim = '', $nama = '', $tempat = '', $tl = '', $gender = '', $telp = '', $email = '')
	{
		$this->id = $id;
		$this->nim = $nim;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->telp = $telp;
		$this->email = $email;
	}

	function setId($id)
	{
		$this->id = $id;
	}
	function setNim($nim)
	{
		$this->nim = $nim;
	}
	function setNama($nama)
	{
		$this->nama = $nama;
	}
	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}
	function setTl($tl)
	{
		$this->tl = $tl;
	}
	function setGender($gender)
	{
		$this->gender = $gender;
	}
	function setEmail($email)
	{
		$this->email = $email;
	}
	function setTelp($telp)
	{
		$this->telp = $telp;
	}

	function getId()
	{
		return $this->id;
	}
	function getNim()
	{
		return $this->nim;
	}
	function getNama()
	{
		return $this->nama;
	}
	function getTempat()
	{
		return $this->tempat;
	}
	function getTl()
	{
		return $this->tl;
	}
	function getGender()
	{
		return $this->gender;
	}
	function getEmail()
	{
		return $this->email;
	}
	function getTelp()
	{
		return $this->telp;
	}
}
