<?php

require_once("model/Template.class.php");
require_once("model/DB.class.php");
require_once("model/Mahasiswa.class.php");
require_once("model/TabelMahasiswa.class.php");
require_once("presenter/ProsesMahasiswa.php");

// Cek apakah ada ID yang dikirim
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $mhs = new ProsesMahasiswa();
    $mhs->deleteMahasiswa($id);
}

// Redirect ke halaman utama
header("Location: index.php");