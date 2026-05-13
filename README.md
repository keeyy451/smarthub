# Smart-Hub Management System 🚀

**Tugas UTS Pemrograman Fullstack - Universitas Dian Nusantara**

Smart-Hub Management System adalah platform terintegrasi untuk mengelola peminjaman ruang kerja dan inventaris peralatan studio secara mandiri. Sistem ini dirancang untuk melayani dua jenis pengguna: **Admin** (melalui Web Dashboard) dan **Member** (melalui integrasi REST API untuk aplikasi tablet).

## ✨ Fitur Utama

- **Premium UI/UX**: Menggunakan desain *Glassmorphism* dengan palet warna *Sky Blue* dan tipografi *Outfit*.
- **Admin Dashboard**: Visualisasi statistik inventaris, booking, dan aktivitas member secara real-time.
- **Manajemen Inventaris (CRUD)**: Pengelolaan lengkap peralatan studio (Kamera, Laptop, Audio, dll).
- **Booking System**: Sistem pemesanan ruangan dengan validasi status otomatis.
- **Secure REST API**: Autentikasi berbasis Token (Laravel Sanctum) untuk integrasi aplikasi pihak ketiga (Tablet Check-in).
- **Real-time Check-in/out**: Pencatatan otomatis status peralatan melalui endpoint API.

## 🛠️ Tech Stack

- **Framework**: Laravel 11/13
- **Database**: MySQL
- **Frontend**: Blade Template, Bootstrap 5, Vanilla CSS (Premium Custom Styles)
- **API Security**: Laravel Sanctum (Token based)
- **Version Control**: Git (Branching Strategy)

## 🚀 Cara Instalasi

1. **Clone Repositori**:
   ```bash
   git clone [url-repo-anda]
   cd smarthub
   ```

2. **Instal Dependencies**:
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Konfigurasi Environment**:
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database MySQL Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi Database**:
   ```bash
   php artisan migrate
   ```

5. **Jalankan Aplikasi**:
   ```bash
   php artisan serve
   ```

## 📡 API Documentation

Sistem ini menyediakan endpoint API yang diproteksi token:

- **POST** `/api/login`: Mendapatkan Token Autentikasi.
- **GET** `/api/equipments`: Mengambil daftar inventaris peralatan.
- **POST** `/api/checkin`: Mengirim status check-in/out peralatan secara real-time.

---
**Dibuat Oleh**: [Nama Anda]
**NIM**: [NIM Anda]
**Mata Kuliah**: Pemrograman Fullstack
