# TP09DPBO2025
---
saya Rexy Putra Nur Laksana dengan NIM 2309578 mengerjakan soal TP 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Struktur Direktori
---
```
├── model/
│   ├── DB.class.php
│   ├── Mahasiswa.class.php
│   ├── TabelMahasiswa.class.php
│   └── Template.class.php
├── presenter/
│   ├── KontrakPresenter.php
│   └── ProsesMahasiswa.php
├── templates/
│   ├── form.html
│   └── skin.html
├── view/
│   ├── KontrakView.php
│   ├── TampilMahasiswa.php
│   └── TampilForm.php
├── delete.php
├── form.php
└── index.php
```

## Arsitektur MVP (Model-View-Presenter)
---
Aplikasi ini mengimplementasikan arsitektur MVP dengan struktur sebagai berikut:

### Model
Model berfungsi untuk menangani data dan logika bisnis aplikasi. Komponen model meliputi:

- **DB.class.php**: Kelas untuk menangani koneksi dan operasi database
- **Mahasiswa.class.php**: Kelas untuk merepresentasikan entitas mahasiswa beserta properti dan metodanya
- **TabelMahasiswa.class.php**: Kelas untuk menangani operasi CRUD ke dalam tabel mahasiswa pada database

### View
View berfungsi untuk menampilkan data kepada pengguna. Komponen view meliputi:

- **KontrakView.php**: Interface yang mendefinisikan kontrak untuk semua kelas view
- **TampilMahasiswa.php**: Kelas untuk menampilkan daftar mahasiswa
- **TampilForm.php**: Kelas untuk menampilkan form penambahan dan edit mahasiswa
- **templates/skin.html**: Template HTML untuk tampilan daftar mahasiswa
- **templates/form.html**: Template HTML untuk form mahasiswa

### Presenter
Presenter berfungsi sebagai perantara antara Model dan View. Komponen presenter meliputi:

- **KontrakPresenter.php**: Interface yang mendefinisikan kontrak untuk kelas presenter
- **ProsesMahasiswa.php**: Kelas yang mengimplementasikan KontrakPresenter dan menghubungkan Model dengan View

## Alur Program
---

### 1. Menampilkan Daftar Mahasiswa

1. User mengakses `index.php`
2. `index.php` memanggil `TampilMahasiswa.php`
3. `TampilMahasiswa` memanggil `ProsesMahasiswa` untuk mengambil data
4. `ProsesMahasiswa` mengambil data dari database melalui `TabelMahasiswa`
5. `TampilMahasiswa` memproses data untuk ditampilkan
6. Data ditampilkan menggunakan template `skin.html`

### 2. Menambah Data Mahasiswa

1. User mengklik tombol "Tambah Mahasiswa"
2. User diarahkan ke `form.php`
3. `form.php` memanggil `TampilForm` tanpa ID
4. `TampilForm` menampilkan form kosong menggunakan template `form.html`
5. User mengisi form dan submit
6. `TampilForm` memanggil `ProsesMahasiswa` untuk menyimpan data
7. `ProsesMahasiswa` menjalankan operasi insert melalui `TabelMahasiswa`
8. User diarahkan kembali ke `index.php`

### 3. Mengedit Data Mahasiswa

1. User mengklik tombol "Edit" pada salah satu data
2. User diarahkan ke `form.php` dengan parameter ID
3. `form.php` memanggil `TampilForm` dengan ID
4. `TampilForm` menampilkan form dengan data yang sudah terisi
5. User mengubah data dan submit
6. `TampilForm` memanggil `ProsesMahasiswa` untuk update data
7. `ProsesMahasiswa` menjalankan operasi update melalui `TabelMahasiswa`
8. User diarahkan kembali ke `index.php`

### 4. Menghapus Data Mahasiswa

1. User mengklik tombol "Hapus" pada salah satu data
2. User diberikan konfirmasi
3. Jika konfirmasi OK, user diarahkan ke `delete.php` dengan parameter ID
4. `delete.php` memanggil `ProsesMahasiswa` untuk menghapus data
5. `ProsesMahasiswa` menjalankan operasi delete melalui `TabelMahasiswa`
6. User diarahkan kembali ke `index.php`

## Detail Komponen

### Model

#### DB.class.php
Kelas ini bertanggung jawab untuk koneksi database. Menyediakan metode:
- `open()`: Membuka koneksi ke database
- `execute()`: Mengeksekusi query
- `getResult()`: Mengambil hasil query
- `close()`: Menutup koneksi database

#### Mahasiswa.class.php
Kelas ini merupakan representasi dari entitas mahasiswa. Memiliki properti:
- `id`: ID mahasiswa
- `nim`: Nomor Induk Mahasiswa
- `nama`: Nama mahasiswa
- `tempat`: Tempat lahir
- `tl`: Tanggal lahir
- `gender`: Jenis kelamin
- `email`: Email
- `telp`: Nomor telepon

Dan menyediakan getter dan setter untuk setiap properti.

#### TabelMahasiswa.class.php
Kelas ini menangani operasi CRUD untuk entitas mahasiswa. Menyediakan metode:
- `getMahasiswa()`: Mengambil semua data mahasiswa
- `getMahasiswaById()`: Mengambil data mahasiswa berdasarkan ID
- `addMahasiswa()`: Menambah data mahasiswa
- `updateMahasiswa()`: Mengupdate data mahasiswa
- `deleteMahasiswa()`: Menghapus data mahasiswa

### Presenter

#### KontrakPresenter.php
Interface yang mendefinisikan kontrak untuk kelas presenter. Mendefinisikan metode-metode yang harus diimplementasikan.

#### ProsesMahasiswa.php
Kelas ini mengimplementasikan `KontrakPresenter` dan berperan sebagai perantara antara Model dan View. Bertanggung jawab untuk:
- Mengambil data dari Model
- Menyiapkan data untuk View
- Menangani operasi CRUD

### View

#### KontrakView.php
Interface yang mendefinisikan kontrak untuk kelas view. Mendefinisikan metode `tampil()` yang harus diimplementasikan.

#### TampilMahasiswa.php
Kelas yang bertanggung jawab untuk menampilkan daftar mahasiswa.

#### TampilForm.php
Kelas yang bertanggung jawab untuk menampilkan form tambah/edit mahasiswa.

## Dokumentasi
---

