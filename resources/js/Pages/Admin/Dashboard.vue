<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../Layouts/AuthenticatedLayout.vue';
import StatCard from '../../Components/StatCard.vue';
import StatusBadge from '../../Components/StatusBadge.vue';

const props = defineProps({
    stats: Object,
    recent_checkins: Array,
    recent_bookings: Array,
    recent_users: Array,
});
</script>

<template>
    <Head title="Admin Dashboard" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Selamat datang di SmartHub Management System</p>
            </div>

            <!-- Stats Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 32px;" class="stagger">
                <StatCard label="Total Peralatan" :value="stats.total_equipment" color="sky">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--sky-400)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Tersedia" :value="stats.tersedia" color="emerald">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--emerald)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Dipinjam" :value="stats.dipinjam" color="amber">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Maintenance" :value="stats.maintenance" color="rose">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--rose)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.066z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Total Booking" :value="stats.total_bookings" color="violet">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--violet)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Booking Pending" :value="stats.booking_pending" color="amber">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--amber)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Total Check-in" :value="stats.total_checkins" color="sky">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--sky-400)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </template>
                </StatCard>
                <StatCard label="Total Member" :value="stats.total_members" color="emerald">
                    <template #icon>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="var(--emerald)" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </template>
                </StatCard>
            </div>

            <!-- Tables Row -->
            <div style="display: grid; grid-template-columns: 1fr; gap: 24px;">
                <!-- Recent Check-ins -->
                <div class="glass-card" style="padding: 24px; overflow: hidden;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: white; margin-bottom: 16px;">Check-in Terbaru</h3>
                    <div style="overflow-x: auto;">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Equipment</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="checkin in recent_checkins" :key="checkin.id">
                                    <td>{{ checkin.user?.name }}</td>
                                    <td>{{ checkin.equipment?.nama_peralatan }}</td>
                                    <td style="font-size: 0.85rem; color: var(--dark-400);">{{ new Date(checkin.waktu_checkin).toLocaleString('id-ID') }}</td>
                                    <td><StatusBadge :status="checkin.status" /></td>
                                </tr>
                                <tr v-if="!recent_checkins?.length">
                                    <td colspan="4" style="text-align: center; color: var(--dark-500); padding: 32px;">Belum ada data check-in</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="glass-card" style="padding: 24px; overflow: hidden;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: white; margin-bottom: 16px;">Booking Terbaru</h3>
                    <div style="overflow-x: auto;">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Ruangan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="booking in recent_bookings" :key="booking.id">
                                    <td>{{ booking.user?.name }}</td>
                                    <td>{{ booking.nama_ruangan }}</td>
                                    <td style="font-size: 0.85rem;">{{ new Date(booking.tanggal).toLocaleDateString('id-ID') }}</td>
                                    <td style="font-size: 0.85rem; color: var(--dark-400);">{{ booking.jam_mulai }} - {{ booking.jam_selesai }}</td>
                                    <td><StatusBadge :status="booking.status" /></td>
                                </tr>
                                <tr v-if="!recent_bookings?.length">
                                    <td colspan="5" style="text-align: center; color: var(--dark-500); padding: 32px;">Belum ada data booking</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
