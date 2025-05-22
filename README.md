# Janji
Saya Nuansa Bening Aura Jelita dengan NIM 2301410 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek 
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Program ini dibangun menggunakan arsitektur **Model-View-ViewModel (MVVM)**) untuk mengelola data ulasan anime dari penonton dengan bahasa pemrograman PHP. MVVM adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama:

## 1. Model
- Bertanggung jawab untuk mengelola data dan logika bisnis
- Menangani operasi database menggunakan PDO dengan prepared statement untuk keamanan
- File yang relevan:
  - `config/Database.php`: Mengelola koneksi ke database MySQL
  - `model/Penonton.php`: Representasi objek untuk tabel penonton
  - `model/Anime.php`: Representasi objek untuk tabel anime
  - `model/Ulasan.php`: Representasi objek untuk tabel ulasan

## 2. View
- Bertanggung jawab untuk menampilkan data kepada pengguna melalui elemen HTML
- File view hanya berisi elemen HTML untuk dirender ke webpage
- File yang relevan:
  - `views/template/header.php`: Template header dengan navigasi
  - `views/template/footer.php`: Template footer dengan copyright
  - `views/penonton_form.php`: Form untuk menambah/edit data penonton
  - `views/penonton_list.php`: Tabel untuk menampilkan daftar penonton
  - `views/anime_form.php`: Form untuk menambah/edit data anime
  - `views/anime_list.php`: Tabel untuk menampilkan daftar anime
  - `views/ulasan_form.php`: Form untuk menambah/edit data ulasan
  - `views/ulasan_list.php`: Tabel untuk menampilkan daftar ulasan

## 3. ViewModel
- Bertindak sebagai perantara antara Model dan View, mengelola logika sebelum data dirender
- Menyiapkan data dari Model untuk ditampilkan di View dan memproses input user
- File yang relevan:
  - `viewmodel/PenontonViewModel.php`: Mengelola data penonton untuk View
  - `viewmodel/AnimeViewModel.php`: Mengelola data anime untuk View
  - `viewmodel/UlasanViewModel.php`: Mengelola data ulasan untuk View

### Database (anime)
Database bernama `anime` terdiri dari tiga tabel:

#### Tabel: `penonton`
| Kolom     | Tipe            | Deskripsi                          |
|-----------|-----------------|------------------------------------|
| id        | INT(11) AUTO_INCREMENT PRIMARY KEY | Identifikasi unik untuk penonton |
| nama      | VARCHAR(100) NOT NULL | Nama lengkap penonton             |
| email     | VARCHAR(100) NOT NULL | Alamat email penonton             |
| telepon   | VARCHAR(20)           | Nomor telepon penonton            |

#### Tabel: `anime`
| Kolom        | Tipe            | Deskripsi                          |
|--------------|-----------------|------------------------------------|
| id           | INT(11) AUTO_INCREMENT PRIMARY KEY | Identifikasi unik untuk anime |
| nama_anime   | VARCHAR(100) NOT NULL | Nama anime                      |
| genre        | VARCHAR(50)           | Genre anime                     |
| tahun_rilis  | INT                   | Tahun rilis anime               |
| status       | ENUM('Tamat', 'Ongoing') NOT NULL | Status anime (Tamat/Ongoing) |

#### Tabel: `ulasan`
| Kolom        | Tipe            | Deskripsi                          |
|--------------|-----------------|------------------------------------|
| id           | INT(11) AUTO_INCREMENT PRIMARY KEY | Identifikasi unik untuk ulasan |
| id_penonton  | INT NOT NULL    | ID penonton (foreign key ke penonton) |
| id_anime     | INT NOT NULL    | ID anime (foreign key ke anime)   |
| komentar     | VARCHAR(100)    | Komentar ulasan                   |
| rating       | INT CHECK (rating >= 1 AND rating <= 5) | Rating (1-5)             |

# Alur Program

### 1. Inisialisasi
- Program dimulai dari `index.php`, yang bertindak sebagai pengontrol utama
- Berdasarkan parameter URL (`entity` dan `action`), `index.php` mengarahkan ke ViewModel dan View yang sesuai
- Halaman default diarahkan ke daftar ulasan (`entity=ulasan`)

### 2. Ulasan
- **Tampil Daftar Ulasan**:
  1. User masuk ke halaman ulasan (`index.php?entity=ulasan`)
  2. `UlasanViewModel` mengambil data dari `Ulasan`
  3. Data ditampilkan di `ulasan_list.php` sebagai tabel
- **Tambah Ulasan**:
  1. User klik "Tambah Ulasan" di `ulasan_list.php`
  2. `ulasan_form.php` menampilkan form
  3. Data disimpan via `UlasanViewModel` ke database
  4. Kembali ke daftar ulasan
- **Edit Ulasan**:
  1. User klik "Edit" di `ulasan_list.php`
  2. `ulasan_form.php` menampilkan form dengan data terisi
  3. Data diperbarui via `UlasanViewModel`
  4. Kembali ke daftar ulasan
- **Hapus Ulasan**:
  1. User klik "Hapus" di `ulasan_list.php`
  2. Konfirmasi, lalu data dihapus via `UlasanViewModel`
  3. Kembali ke daftar ulasan

### 3. Penonton
- **Tampil Daftar Penonton**:
  1. User masuk ke halaman penonton (`index.php?entity=penonton`)
  2. `PenontonViewModel` mengambil data dari `Penonton`
  3. Data ditampilkan di `penonton_list.php` sebagai tabel
- **Tambah Penonton**:
  1. User klik "Tambah Penonton" di `penonton_list.php`
  2. `penonton_form.php` menampilkan form
  3. Data disimpan via `PenontonViewModel`
  4. Kembali ke daftar penonton
- **Edit Penonton**:
  1. User klik "Edit" di `penonton_list.php`
  2. `penonton_form.php` menampilkan form dengan data terisi
  3. Data diperbarui via `PenontonViewModel`
  4. Kembali ke daftar penonton
- **Hapus Penonton**:
  1. User klik "Hapus" di `penonton_list.php`
  2. Konfirmasi, lalu data dihapus via `PenontonViewModel`
  3. Kembali ke daftar penonton

### 4. Anime
- **Tampil Daftar Anime**:
  1. User masuk ke halaman anime (`index.php?entity=anime`)
  2. `AnimeViewModel` mengambil data dari `Anime`
  3. Data ditampilkan di `anime_list.php` sebagai tabel
- **Tambah Anime**:
  1. User klik "Tambah Anime" di `anime_list.php`
  2. `anime_form.php` menampilkan form
  3. Data disimpan via `AnimeViewModel`
  4. Kembali ke daftar anime
- **Edit Anime**:
  1. User klik "Edit" di `anime_list.php`
  2. `anime_form.php` menampilkan form dengan data terisi
  3. Data diperbarui via `AnimeViewModel`
  4. Kembali ke daftar anime.
- **Hapus Anime**:
  1. User klik "Hapus" di `anime_list.php`
  2. Konfirmasi, lalu data dihapus via `AnimeViewModel`
  3. Kembali ke daftar anime

# Dokumentasi 

## Penonton
![Deskripsi Gambar](ScreenRecord-Penonton/Record-Penonton.gif)
*Review seluruh halaman, lalu halaman Penonton dengan proses kelolanya*

## Anime
![Deskripsi Gambar](ScreenRecord-Anime/Record-Anime.gif)
*Halaman Anime dengan proses kelolanya*

## Ulasan
![Deskripsi Gambar](ScreenRecord-Ulasan/Record-Ulasan.gif)
*Halaman utama yaitu bagian Ulasan dengan proses kelolanya*
