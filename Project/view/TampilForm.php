<?php
/******************************************
 * Asisten Pemrogaman 13 & 14
 ******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilForm implements KontrakView
{
    private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
    private $tpl;
    private $id;
    
    function __construct($id = '')
    {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
        $this->id = $id;
    }

    function tampil()
    {
        $title = "Tambah";
        $button = "Simpan";
        $update = '';

        // Data untuk form
        $nim = '';
        $nama = '';
        $tempat = '';
        $tl = '';
        $gender = '';
        $email = '';
        $telp = '';

        // Jika ada id yang dikirim, berarti edit data
        if (!empty($this->id)) {
            $title = "Edit";
            $button = "Update";
            
            $this->prosesmahasiswa->prosesDataMahasiswa();
            
            // Cari data dengan id yang sesuai
            for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
                if ($this->prosesmahasiswa->getId($i) == $this->id) {
                    $nim = $this->prosesmahasiswa->getNim($i);
                    $nama = $this->prosesmahasiswa->getNama($i);
                    $tempat = $this->prosesmahasiswa->getTempat($i);
                    $tl = $this->prosesmahasiswa->getTl($i);
                    $gender = $this->prosesmahasiswa->getGender($i);
                    $email = $this->prosesmahasiswa->getEmail($i);
                    $telp = $this->prosesmahasiswa->getTelp($i);
                    break;
                }
            }
            
            // Update data
            if (isset($_POST['submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $tempat = $_POST['tempat'];
                $tl = $_POST['tl'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                
                $this->prosesmahasiswa->updateMahasiswa($this->id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
                header("Location: index.php");
            }
            
            $update = '<input type="hidden" name="id" value="' . $this->id . '">';
        } else {
            // Insert data baru
            if (isset($_POST['submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $tempat = $_POST['tempat'];
                $tl = $_POST['tl'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                
                $this->prosesmahasiswa->insertMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
                header("Location: index.php");
            }
        }

        // Set checked untuk radio button gender
        $male_checked = ($gender == 'Laki-laki') ? 'checked' : '';
        $female_checked = ($gender == 'Perempuan') ? 'checked' : '';

        // Membaca template form.html
        $this->tpl = new Template("templates/form.html");

        // Mengganti kode template dengan data
        $this->tpl->replace("DATA_TITLE", $title);
        $this->tpl->replace("DATA_BUTTON", $button);
        $this->tpl->replace("DATA_UPDATE", $update);
        $this->tpl->replace("DATA_NIM", $nim);
        $this->tpl->replace("DATA_NAMA", $nama);
        $this->tpl->replace("DATA_TEMPAT", $tempat);
        $this->tpl->replace("DATA_TL", $tl);
        $this->tpl->replace("DATA_MALE_CHECKED", $male_checked);
        $this->tpl->replace("DATA_FEMALE_CHECKED", $female_checked);
        $this->tpl->replace("DATA_EMAIL", $email);
        $this->tpl->replace("DATA_TELP", $telp);

        // Menampilkan form
        $this->tpl->write();
    }
}