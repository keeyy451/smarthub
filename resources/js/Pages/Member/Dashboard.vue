<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../Layouts/AuthenticatedLayout.vue';
import StatCard from '../../Components/StatCard.vue';
import StatusBadge from '../../Components/StatusBadge.vue';

defineProps({
    stats: Object,
    recent_bookings: Array,
    recent_checkins: Array,
    borrowed_equipments: Array,
});
</script>

<template>
    <Head title="Member Dashboard" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Selamat datang di SmartHub! Berikut ringkasan aktivitas Anda.</p>
            </div>

            <!-- Stats Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 32px;" class="stagger">
                <StatCard label="Booking Aktif/Selesai" :value="stats.my_bookings" color="sky">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--sky-400)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </template>
                </StatCard>
                
                <StatCard label="Booking Menunggu" :value="stats.booking_pending" color="amber">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </template>
                </StatCard>

                <StatCard label="Peminjaman Disetujui" :value="stats.booking_approved" color="emerald">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--emerald)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </template>
                </StatCard>

                <StatCard label="Peralatan Dipinjam" :value="borrowed_equipments.length" color="violet">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--violet)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </template>
                </StatCard>
            </div>

            <!-- Main Content Area -->
            <div style="display: grid; grid-template-columns: minmax(0, 2fr) minmax(0, 1fr); gap: 24px;">
                
                <!-- Left Column -->
                <div style="display: flex; flex-direction: column; gap: 24px;">
                    <!-- Currently Borrowed Equipment -->
                    <div class="glass-card" style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h3 style="font-size: 1.1rem; font-weight: 700; color: white;">Sedang Dipinjam</h3>
                            <Link href="/member/equipment" class="btn btn-ghost btn-sm">Lihat Semua Alat</Link>
                        </div>
                        
                        <div v-if="borrowed_equipments.length" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px;">
                            <div v-for="item in borrowed_equipments" :key="item.id" style="background: rgba(15, 23, 42, 0.4); border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; padding: 16px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                                    <span style="font-size: 0.75rem; color: var(--sky-400); font-weight: 600; text-transform: uppercase;">{{ item.kategori }}</span>
                                    <StatusBadge :status="item.status" />
                                </div>
                                <h4 style="font-size: 1rem; font-weight: 600; color: white; margin-bottom: 16px;">{{ item.nama_peralatan }}</h4>
                                <Link :href="`/member/equipment`" class="btn btn-warning btn-sm" style="width: 100%;">
                                    Kembalikan (Check-in)
                                </Link>
                            </div>
                        </div>
                        <div v-else class="empty-state" style="padding: 30px;">
                            <p>Anda tidak sedang meminjam peralatan apapun saat ini.</p>
                            <Link href="/member/equipment" class="btn btn-primary" style="margin-top: 16px;">Pinjam Alat</Link>
                        </div>
                    </div>

                    <!-- Recent Bookings -->
                    <div class="glass-card" style="padding: 24px; overflow: hidden;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <h3 style="font-size: 1rem; font-weight: 700; color: white;">Riwayat Booking Ruangan</h3>
                            <Link href="/member/booking" class="btn btn-ghost btn-xs">Lihat Lengkap</Link>
                        </div>
                        <div style="overflow-x: auto;">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Ruangan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="booking in recent_bookings" :key="booking.id">
                                        <td style="font-weight: 500; color: white;">{{ booking.nama_ruangan }}</td>
                                        <td style="font-size: 0.85rem;">
                                            <div>{{ new Date(booking.tanggal).toLocaleDateString('id-ID', { day:'2-digit', month:'short' }) }}</div>
                                            <div style="color: var(--dark-400);">{{ booking.jam_mulai.substring(0,5) }} - {{ booking.jam_selesai.substring(0,5) }}</div>
                                        </td>
                                        <td><StatusBadge :status="booking.status" /></td>
                                    </tr>
                                    <tr v-if="!recent_bookings?.length">
                                        <td colspan="3" class="empty-state" style="padding: 20px;">Belum ada riwayat booking</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Recent Check-ins -->
                    <div class="glass-card" style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h3 style="font-size: 1rem; font-weight: 700; color: white;">Aktivitas Terakhir</h3>
                            <Link href="/member/equipment/history" class="btn btn-ghost btn-xs">Riwayat Lengkap</Link>
                        </div>
                        
                        <div v-if="recent_checkins.length" style="display: flex; flex-direction: column; gap: 16px;">
                            <div v-for="log in recent_checkins" :key="log.id" style="display: flex; gap: 16px; align-items: flex-start; padding-bottom: 16px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <div style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;"
                                     :style="{ background: log.status === 'checked_out' ? 'rgba(245, 158, 11, 0.15)' : 'rgba(16, 185, 129, 0.15)' }">
                                    <svg v-if="log.status === 'checked_out'" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                                    <svg v-else width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="var(--emerald)" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                                </div>
                                <div style="flex: 1;">
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                        <span style="font-weight: 600; font-size: 0.9rem; color: white;">{{ log.status === 'checked_out' ? 'Pinjam' : 'Kembali' }}</span>
                                        <span style="font-size: 0.75rem; color: var(--dark-400);">{{ new Date(log.waktu_checkin).toLocaleDateString('id-ID', { month: 'short', day: 'numeric' }) }}</span>
                                    </div>
                                    <div style="font-size: 0.85rem; color: var(--dark-200);">{{ log.equipment?.nama_peralatan }}</div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="empty-state" style="padding: 20px;">
                            <p>Belum ada aktivitas pinjam/kembali.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
@media (max-width: 1024px) {
    .container-page > div:last-child {
        grid-template-columns: 1fr !important;
    }
}
</style>
