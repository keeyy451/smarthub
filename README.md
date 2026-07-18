# Smart-Hub Management System

##  Penjelasan
Smart-Hub Management System adalah platform terintegrasi berbasis web untuk mengelola peminjaman ruang kerja dan inventaris peralatan studio secara mandiri. Sistem ini dirancang untuk memudahkan manajemen aset dan pemesanan ruangan bagi Admin maupun Member melalui antarmuka yang modern dan responsif.

##  Stack / Teknis
- **Bahasa Pemrograman / Framework**: PHP (Laravel 13), JavaScript (Vue 3 + Inertia.js), CSS (Vanilla CSS modern)
- **Database**: PostgreSQL via Supabase (Cloud Database API)
- **AI Recommendation**: Antigravity (Google DeepMind) untuk pendampingan code generation & arsitektur proyek
- **Version Control**: Git (Arsitektur Multi-branch)

## Flow Aplikasi
1. **Autentikasi & Otorisasi**: Pengguna melakukan login melalui halaman autentikasi terpusat, di mana sistem akan memvalidasi *role* dan mengarahkan pengguna ke dashboard Admin atau Member.
2. **Manajemen Data Master (Admin)**: Admin mengelola data master peralatan (CRUD), memonitor statistik keseluruhan, serta meninjau riwayat transaksi peminjaman dan *check-in* secara terpusat.
3. **Transaksi & Aktivitas (Member)**: Member menelusuri katalog peralatan, melakukan *check-out*/*check-in* alat secara mandiri, dan membuat reservasi (*booking*) ruangan sesuai ketersediaan.
4. **Integrasi Sistem**: Seluruh interaksi antarmuka pengguna pada *web application* dikomunikasikan secara sinkron dan aman ke *backend services* melalui *endpoints* API dan arsitektur Inertia.js.
