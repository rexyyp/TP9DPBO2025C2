<?php

include("model/Template.class.php");
include("view/TampilForm.php");

// Cek apakah ada ID yang dikirim (untuk update)
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Inisialisasi view
$form = new TampilForm($id);
$form->tampil();