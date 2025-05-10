<?php

require_once("model/Template.class.php");
require_once("model/DB.class.php");
require_once("model/Mahasiswa.class.php");
require_once("model/TabelMahasiswa.class.php");

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	// Deklarasi variabel
	public function prosesDataMahasiswa();
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();

	// CRUD
	public function insertMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function deleteMahasiswa($id);
}