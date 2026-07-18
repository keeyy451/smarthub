# Smart-Hub Management System - Documentation

Sistem ini dirancang untuk mengelola peminjaman ruang kerja (coworking space) dan inventaris peralatan studio. Sistem melayani dua jenis pengguna: Admin (via Web) dan Anggota (via Web & Tablet API).

## 1. Analisis Skema Database

Sistem menggunakan database MySQL dengan entitas utama sebagai berikut:

### Tabel `users`
Menyimpan data pengguna sistem.
- `id`: Primary Key
- `name`: Nama lengkap
- `email`: Alamat email (unik)
- `password`: Hash password
- `role`: Peran pengguna (`admin` atau `member`)

### Tabel `equipments`
Menyimpan data inventaris peralatan studio.
- `id`: Primary Key
- `nama_peralatan`: Nama alat
- `kategori`: Kategori alat (Kamera, Lighting, Audio, dll)
- `kondisi`: Kondisi fisik (`baik`, `rusak_ringan`, `rusak_berat`)
- `status`: Status ketersediaan (`tersedia`, `dipinjam`, `maintenance`)
- `jumlah`: Stok peralatan

### Tabel `room_bookings`
Menyimpan jadwal peminjaman ruangan.
- `id`: Primary Key
- `user_id`: Foreign Key ke `users`
- `nama_ruangan`: Nama ruangan yang di-booking
- `tanggal`: Tanggal peminjaman
- `jam_mulai`: Waktu mulai
- `jam_selesai`: Waktu selesai
- `status`: Status booking (`pending`, `approved`, `rejected`, `selesai`)

### Tabel `equipment_checkins`
Log aktivitas peminjaman dan pengembalian peralatan.
- `id`: Primary Key
- `user_id`: Foreign Key ke `users`
- `equipment_id`: Foreign Key ke `equipments`
- `waktu_checkin`: Timestamp aksi
- `status`: Jenis aksi (`checked_out` / pinjam, `checked_in` / kembali)

---

## 2. Detail Endpoint API (REST API)

API menggunakan **Laravel Sanctum** untuk autentikasi berbasis token. Semua request harus menyertakan header `Accept: application/json`.

### Autentikasi
- **POST `/api/login`**
  - Body: `email`, `password`
  - Response: Token akses dan data user.
- **POST `/api/logout`** (Auth required)
  - Menghapus token aktif.

### Inventaris Peralatan
- **GET `/api/equipments`** (Auth required)
  - Mengambil semua data peralatan yang tersedia.
- **POST `/api/equipments`** (Admin only)
  - Menambah peralatan baru.
- **PUT `/api/equipments/{id}`** (Admin only)
  - Update data peralatan.
- **DELETE `/api/equipments/{id}`** (Admin only)
  - Menghapus peralatan.

### Check-in/Check-out (Tablet App)
- **POST `/api/checkin`** (Auth required)
  - Body: `equipment_id`, `status` (`checked_out` atau `checked_in`)
  - Digunakan oleh aplikasi tablet untuk mencatat peminjaman/pengembalian secara real-time.

---

## 3. Strategi Version Control (Git)

Untuk mendukung pengerjaan fitur secara paralel (seperti fitur "Notifikasi Email"), tim menggunakan strategi **Git Flow** sederhana:

1.  **Main Branch**: Menyimpan kode produksi yang stabil.
2.  **Development Branch**: Branch utama untuk integrasi fitur sebelum rilis.
3.  **Feature Branches**: Setiap fitur baru dikerjakan di branch terpisah (contoh: `feature/email-notification`).
    - Hal ini memungkinkan pengembang lain mengerjakan notifikasi email tanpa mengganggu fungsionalitas CRUD utama di branch `main`.
    - Setelah fitur selesai dan di-test, branch fitur akan di-merge kembali ke `development` atau `main` melalui Pull Request/Merge Request.

---

## 4. Fitur Utama & Validasi

- **Validasi Overlap**: Sistem secara otomatis menolak booking ruangan jika pada waktu dan ruangan yang sama sudah ada booking lain yang disetujui/pending.
- **Otoritas Peminjaman**: Pengembalian peralatan melalui Web/API divalidasi agar hanya peminjam asli yang dapat melakukan check-in (kembali).
- **Responsive Dashboard**: Interface admin dan member menggunakan Bootstrap 5 dengan desain modern dan premium.

---
*Dokumen ini disusun sebagai bagian dari pemenuhan tugas UTS Pemrograman Fullstack - Universitas Dian Nusantara.*
