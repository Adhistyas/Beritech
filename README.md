# Beritech — Portal Berita Teknologi

> Platform portal berita teknologi berbasis web yang dibangun dengan **CodeIgniter 4**. Beritech menyajikan artikel teknologi terkini dengan tampilan frontend yang elegan untuk pembaca serta panel admin yang lengkap untuk pengelolaan konten.

---

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Arsitektur Aplikasi](#-arsitektur-aplikasi)
- [Skema Database](#-skema-database)
- [Routing Aplikasi](#-routing-aplikasi)
- [Cara Inisialisasi Project](#-cara-inisialisasi-project)
- [Konfigurasi Environment](#-konfigurasi-environment)
- [Akun Default](#-akun-default)

---

## 📖 Tentang Project

**Beritech** adalah aplikasi portal berita yang berfokus pada konten teknologi. Project ini dikembangkan sebagai UAS (Ujian Akhir Semester) mata kuliah Pemrograman Web 2. Aplikasi ini memiliki dua sisi utama:

- **Frontend (Pengunjung)** — Halaman publik untuk membaca artikel, menelusuri kategori, dan melihat halaman tentang.
- **Backend / Admin Panel** — Halaman terproteksi untuk administrator dalam mengelola artikel, kategori, dan konten portal.

---

## Fitur Utama

### Frontend (Pengunjung)
- Halaman beranda dengan daftar artikel terbaru
- Halaman daftar artikel dengan pagination
- Detail artikel lengkap dengan konten HTML
- Pengelompokan artikel berdasarkan kategori
- Halaman tentang portal

### Admin Panel
- Autentikasi admin (login/logout) berbasis session
- Dashboard ringkasan konten
- CRUD Artikel (Create, Read, Update, Delete)
  - Upload gambar artikel
  - Auto-generate slug unik dari judul
  - Status artikel: `draft` / `published`
  - Rich text editor untuk konten (HTML)
- CRUD Kategori
- Filter autentikasi (`adminauth`) untuk proteksi rute admin

---

## Teknologi yang Digunakan

- PHP
- CodeIgniter 4
- MySQL
- Tailwind CSS
- JavaScript
- Summernote
- HTML5
- CSS3
- XAMPP

---

## Arsitektur Aplikasi

Aplikasi ini menggunakan konsep arsitektur **MVC (Model-View-Controller)** bawaan CodeIgniter 4


### Penjelasan Layer

| Layer | Lokasi | Deskripsi |
|---|---|---|
| **Routes** | `app/Config/Routes.php` | Mendefinisikan semua URL dan memetakannya ke controller |
| **Filter** | `app/Filters/AdminAuthFilter.php` | Middleware autentikasi — redirect ke login jika belum login |
| **Controller** | `app/Controllers/` | Memproses request, memanggil model, dan meneruskan data ke view |
| **Model** | `app/Models/` | Mengelola interaksi dengan database menggunakan Query Builder CI4 |
| **View** | `app/Views/` | Template HTML+PHP untuk rendering halaman, dibagi per area |

---

## Skema Database

Database bernama **`beritech`** terdiri dari 3 tabel utama.

### Tabel: `articles`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT UNSIGNED (PK) | ID unik artikel, auto-increment |
| `category_id` | INT UNSIGNED (FK) | Referensi ke tabel `categories` |
| `title` | VARCHAR(200) | Judul artikel |
| `slug` | VARCHAR(220) UNIQUE | Slug URL unik (di-generate otomatis dari judul) |
| `author` | VARCHAR(100) | Nama penulis |
| `content` | TEXT | Isi artikel (format HTML) |
| `image` | VARCHAR(255) | Nama file gambar (tersimpan di `public/uploads/`) |
| `status` | ENUM('draft','published') | Status publikasi artikel |
| `published_at` | DATE | Tanggal artikel dipublikasikan |
| `created_at` | DATETIME | Waktu data dibuat (auto-managed CI4) |
| `updated_at` | DATETIME | Waktu data diperbarui (auto-managed CI4) |

### Tabel: `categories`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT UNSIGNED (PK) | ID unik kategori, auto-increment |
| `name` | VARCHAR(100) | Nama kategori |
| `slug` | VARCHAR(120) UNIQUE | Slug URL kategori |
| `created_at` | DATETIME | Waktu data dibuat |
| `updated_at` | DATETIME | Waktu data diperbarui |

**Kategori default yang tersedia:** Gadget, Aplikasi & Software, Kecerdasan Buatan, Startup, Internet & Jaringan, Sains Digital

### Tabel: `users`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT UNSIGNED (PK) | ID unik user, auto-increment |
| `name` | VARCHAR(100) | Nama lengkap |
| `username` | VARCHAR(50) UNIQUE | Username untuk login |
| `email` | VARCHAR(100) | Alamat email |
| `password` | VARCHAR(255) | Password ter-hash (bcrypt) |
| `created_at` | DATETIME | Waktu data dibuat |
| `updated_at` | DATETIME | Waktu data diperbarui |


## Cara Inisialisasi Project

Ikuti langkah-langkah berikut secara berurutan.

### Prasyarat

Pastikan perangkat sudah terpasang:
- **PHP** versi 8.2 atau lebih baru (dengan ekstensi `intl`, `mbstring`, `mysqli`)
- **Composer** ([getcomposer.org](https://getcomposer.org/))
- **MySQL** atau **MariaDB**
- **Git**
- *(Opsional)* **XAMPP** sebagai all-in-one stack untuk development lokal

---

### Langkah 1 — Clone Repository

```bash
git clone https://github.com/<username>/UASWEB2_Bagas-Aditiya.git
cd "UASWEB2_Bagas Aditiya"
```

> Ganti `<username>` dengan username GitHub yang sesuai.

---

### Langkah 2 — Install Dependensi PHP

```bash
composer install
```

---

### Langkah 3 — Salin File Environment

```bash
cp .env.example .env
```

Kemudian edit file `.env` sesuai konfigurasi lokal (lihat bagian [Konfigurasi Environment](#-konfigurasi-environment) di bawah).

---

### Langkah 4 — Buat Database

Buka **phpMyAdmin** atau MySQL CLI, lalu buat database baru:

```sql
CREATE DATABASE IF NOT EXISTS beritech
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;
```

---

### Langkah 5 — Import Database

Import file SQL yang tersedia. File ini sudah berisi skema tabel lengkap beserta data awal (artikel contoh, kategori, dan akun admin).

**Melalui phpMyAdmin:**
1. Buka `http://localhost/phpmyadmin`
2. Pilih database **`beritech`**
3. Klik tab **Import**
4. Pilih file `app/Database/UAS_WEB2_fix.sql`
5. Klik **Go / Kirim**

**Melalui MySQL CLI:**
```bash
mysql -u root -p beritech < app/Database/UAS_WEB2_fix.sql
```

---

### Langkah 6 — Atur Izin Direktori

*(Untuk pengguna Linux/macOS)*

```bash
chmod -R 775 writable/
chmod -R 775 public/uploads/
```

---

### Langkah 7 — Jalankan Server Development

```bash
php spark serve
```

Aplikasi akan berjalan di: **[http://localhost:8080](http://localhost:8080)**

Untuk menjalankan di port tertentu:
```bash
php spark serve --port 8081
```

**Akses halaman:**
- Frontend (publik): `http://localhost:8080/`
- Admin Panel: `http://localhost:8080/admin/login`

---

## ⚙️ Konfigurasi Environment

Edit file `.env` sesuai kebutuhan. Berikut penjelasan setiap variabel:

```env
# ─────────────────────────────────────────────────────────────────
# ENVIRONMENT APLIKASI
# ─────────────────────────────────────────────────────────────────

# Mode environment aplikasi.
# 'development' → tampilkan pesan error secara detail (untuk debugging)
# 'production'  → sembunyikan error dari pengguna (untuk server publik)
CI_ENVIRONMENT = development


# ─────────────────────────────────────────────────────────────────
# BASE URL APLIKASI
# ─────────────────────────────────────────────────────────────────

# URL dasar aplikasi. Harus diakhiri dengan tanda '/'.
# Untuk development dengan 'php spark serve':
app.baseURL = 'http://localhost:8080/'

# Jika menggunakan XAMPP via Apache (sesuaikan nama folder):
# app.baseURL = 'http://localhost/UASWEB2_Bagas Aditiya/public/'


# ─────────────────────────────────────────────────────────────────
# KONFIGURASI DATABASE
# ─────────────────────────────────────────────────────────────────

# Hostname server database
# Gunakan '127.0.0.1' atau 'localhost'
database.default.hostname = 127.0.0.1

# Nama database yang digunakan
database.default.database = beritech

# Username MySQL (default XAMPP: root)
database.default.username = root

# Password MySQL (default XAMPP: kosong/tanpa password)
database.default.password =

# Driver database yang digunakan
database.default.DBDriver = MySQLi

# Port MySQL (default: 3306)
database.default.port = 3306
```

---

## Akun Default

Setelah import database, gunakan akun berikut untuk masuk ke panel admin:

| Field | Value |
|---|---|
| **URL Login** | `http://localhost:8080/admin/login` |
| **Username** | `admin` |
| **Password** | `admin123` |
| **Email** | `admin@beritech.com` |

---

## Author

| | |
|---|---|
| **Nama** | Bagas Aditiya |
| **Project** | UAS Pemrograman Web 2 — Beritech |
| **NIM** | 240401010141 |

---
