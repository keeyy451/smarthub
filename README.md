#  Smart-Hub Management System

> **Tugas UAS Pemrograman Fullstack — Universitas Dian Nusantara**

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Inertia.js](https://img.shields.io/badge/Inertia.js-1.x-9553E9?style=for-the-badge&logo=inertia&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3.x-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white)
![Supabase](https://img.shields.io/badge/Supabase-PostgreSQL-3ECF8E?style=for-the-badge&logo=supabase&logoColor=white)
![Git](https://img.shields.io/badge/Git-Version%20Control-F05032?style=for-the-badge&logo=git&logoColor=white)

---

##  Deskripsi Proyek

**Smart-Hub Management System** adalah platform terintegrasi untuk mengelola peminjaman ruang kerja dan inventaris peralatan studio secara mandiri. Sistem ini dirancang untuk melayani dua jenis pengguna: **Admin** (melalui Web Dashboard berbasis Inertia.js + Vue 3) dan **Member** (melalui fitur member panel & REST API untuk integrasi tablet).

---

##  Fitur Utama

###  Web Application (Frontend — Inertia.js + Vue 3)
- **Autentikasi**: Login & Register dengan validasi role (Admin / Member)
- **Admin Dashboard**: Statistik inventaris, booking, check-in, dan member secara real-time
- **Manajemen Peralatan (CRUD)**: List, Create, Edit, Delete data peralatan studio
- **Manajemen Booking**: List, Create, Update status, validasi booking ruangan
- **Log Check-in**: Monitoring aktivitas check-in/out peralatan oleh member
- **Member Dashboard**: Tampilan statistik dan aktivitas pribadi member
- **Member Equipment**: Browse peralatan, checkout & checkin alat
- **Member Booking**: Membuat, melihat, dan membatalkan booking ruangan
- **Profile Management**: Edit profil dan ubah password

###  REST API (Backend — Laravel Sanctum)
- **POST** `/api/login` — Autentikasi & mendapatkan Bearer Token
- **POST** `/api/logout` — Logout & revoke token
- **GET** `/api/equipments` — Daftar inventaris peralatan *(auth required)*
- **POST** `/api/equipments` — Tambah peralatan *(auth required)*
- **PUT** `/api/equipments/{id}` — Update peralatan *(auth required)*
- **DELETE** `/api/equipments/{id}` — Hapus peralatan *(auth required)*
- **GET** `/api/bookings` — Daftar booking ruangan *(auth required)*
- **POST** `/api/bookings` — Buat booking baru *(auth required)*
- **POST** `/api/checkin` — Kirim data check-in peralatan *(auth required)*

###  UI/UX Design
- Desain **Glassmorphism Premium** dengan palet warna Sky Blue
- Tipografi modern menggunakan **Outfit** (Google Fonts)
- Fully **Mobile Responsive** (Tablet & Handheld)
- Smooth micro-animations dan hover effects
- Dark mode dengan gradient dinamis

---

##  Tech Stack

| Kategori | Teknologi |
|----------|-----------|
| **Backend Framework** | Laravel 13 |
| **Frontend Framework** | Inertia.js + Vue 3 |
| **Build Tool** | Vite 8 |
| **Database Cloud** | Supabase (PostgreSQL) |
| **API Security** | Laravel Sanctum (Token-based) |
| **Version Control** | Git (Multi-branch Strategy) |
| **Styling** | Vanilla CSS (Custom Design System) |

---

##  Arsitektur Git (Version Control Strategy)

Proyek ini menggunakan strategi **multi-branch** untuk memisahkan pengembangan backend dan frontend agar tidak bersinggungan:

```
main
├── development          ← Backend API & Middleware
│   └── feature/...     ← Feature branches
└── frontend-inertia     ← Web App Frontend (Inertia.js + Vue 3)
```

| Branch | Fungsi |
|--------|--------|
| `main` | Production-ready code |
| `development` | Backend API services (Laravel Sanctum) |
| `frontend-inertia` | Frontend Web App (Inertia.js + Vue 3 + Supabase) |

---

##  Cara Instalasi & Menjalankan

### Prasyarat
- PHP >= 8.3
- Composer
- Node.js >= 18
- Akun Supabase (untuk database cloud)

### Langkah Instalasi

**1. Clone Repositori & Pindah ke Branch Frontend**
```bash
git clone https://github.com/keeyy451/smarthub.git
cd smarthub
git checkout frontend-inertia
```

**2. Instal PHP Dependencies**
```bash
composer install
```

**3. Instal Node.js Dependencies**
```bash
npm install
```

**4. Konfigurasi Environment**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Update Konfigurasi Database Supabase di `.env`**
```env
DB_CONNECTION=pgsql
DB_HOST=db.xritvfuylovukvyfzikl.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your_supabase_password
```

>  **Aktifkan Extension PHP PostgreSQL**: Buka `php.ini` dan pastikan baris berikut tidak dikomentari:
> ```
> extension=pdo_pgsql
> extension=pgsql
> ```

**6. Jalankan Migrasi Database ke Supabase**
```bash
php artisan migrate --force
```

**7. Jalankan Seeder (Data Awal)**
```bash
php artisan db:seed --force
```

**8. Jalankan Aplikasi**

Buka dua terminal secara bersamaan:
```bash
# Terminal 1 — PHP Server
php artisan serve

# Terminal 2 — Vite Development Server
npm run dev
```

Buka browser: **http://127.0.0.1:8000**

---

##  Akun Default (Setelah Seeder)

| Role | Email | Password |
|------|-------|----------|
| **Admin** | `admin@gmail.com` | `password` |
| **Member** | `member@gmail.com` | `password` |

---

##  Struktur Direktori Frontend (Vue Components)

```
resources/js/
├── app.js                    ← Entry point Inertia.js
├── Components/
│   ├── InputField.vue        ← Reusable input component
│   ├── Alert.vue             ← Flash message component
│   └── Modal.vue             ← Modal dialog component
├── Layouts/
│   ├── AuthenticatedLayout.vue  ← Layout untuk halaman terautentikasi
│   └── GuestLayout.vue          ← Layout untuk halaman tamu (login/register)
└── Pages/
    ├── Auth/
    │   ├── Login.vue
    │   └── Register.vue
    ├── Admin/
    │   ├── Dashboard.vue
    │   ├── Equipments/Index.vue
    │   ├── Bookings/Index.vue
    │   └── Checkins/Index.vue
    ├── Member/
    │   ├── Dashboard.vue
    │   ├── Equipment/Index.vue
    │   └── Booking/Index.vue
    └── Profile/
        └── Edit.vue
```

---

##  Lisensi

Proyek ini dibuat untuk keperluan akademis.

---

**Dibuat Oleh**: Ezra Firmansyah  
**NIM**: 411231135  
**Mata Kuliah**: Pemrograman Fullstack  
**Universitas**: Universitas Dian Nusantara  
**Semester**: UAS 2026
