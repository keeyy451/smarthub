# Smart-Hub Management System

## Instalasi

1. Clone repositori ini
2. Salin `.env.example` ke `.env` dan konfigurasikan database MySQL
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=smarthub
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Jalankan `composer install`
4. Jalankan `npm install && npm run build`
5. Generate application key: `php artisan key:generate`
6. Jalankan migrasi dan seeder:
   `php artisan migrate:fresh --seed`
7. Jalankan server: `php artisan serve`

## Akun Login Admin

**Email:** admin@gmail.com
**Password:** password

## Struktur Folder Project Penting
- `app/Http/Controllers/Api/` - API Controllers untuk aplikasi tablet
- `app/Http/Controllers/` - Web Controllers untuk Dashboard Admin
- `app/Http/Requests/` - Form Request Validation
- `app/Models/` - Eloquent Models dengan Relasinya
- `database/migrations/` - Struktur Tabel Database
- `database/seeders/` - Seeder Data Awal
- `routes/api.php` - Protected & Public API Endpoints
- `routes/web.php` - Web Dashboard Routes
- `resources/views/admin/` - Blade + Bootstrap Admin Views

## Git Workflow Strategy

Proyek ini menggunakan branching strategy berikut:
- `main` - Production
- `development` - Staging/Testing
- `feature/*` - Fitur baru

Contoh Workflow Git yang digunakan:
```bash
# Membuat dan beralih ke branch fitur baru
git checkout -b feature/email-notification

# Menambahkan perubahan ke stage
git add .

# Menyimpan perubahan dengan pesan commit
git commit -m "add email notification feature"

# Mengirim perubahan ke repository remote (origin)
git push origin feature/email-notification

# (Opsional) Menggabungkan kembali ke development
git checkout development
git merge feature/email-notification
```

## API Documentation

**Semua endpoint API dibawah ini (kecuali Login) wajib menyertakan Header:**
`Authorization: Bearer {token}`
`Accept: application/json`

### 1. Login (POST `/api/login`)
Body:
```json
{
    "email": "admin@gmail.com",
    "password": "password"
}
```

### 2. Equipments
- **GET `/api/equipments`** - Ambil semua equipment
- **POST `/api/equipments`** - Tambah equipment baru
- **PUT `/api/equipments/{id}`** - Update equipment
- **DELETE `/api/equipments/{id}`** - Hapus equipment

### 3. Bookings
- **GET `/api/bookings`** - Lihat semua booking
- **POST `/api/bookings`** - Buat booking baru

### 4. Checkin (POST `/api/checkin`)
Body:
```json
{
  "equipment_id": 1,
  "status": "checked_in"
}
```

### 5. Logout (POST `/api/logout`)
*(Memerlukan Token Sanctum)*
Mengakhiri sesi token.
