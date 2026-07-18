<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import Pagination from '../../../Components/Pagination.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';

defineProps({
    checkins: Object,
});
</script>

<template>
    <Head title="Riwayat Peminjaman" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Riwayat Alat</h1>
                    <p class="page-subtitle">Log aktivitas peminjaman dan pengembalian Anda</p>
                </div>
                <Link href="/member/equipment" class="btn btn-ghost">Kembali ke Peralatan</Link>
            </div>

            <div class="glass-card" style="overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Alat yang Dipinjam</th>
                                <th>Kategori</th>
                                <th>Tanggal & Waktu</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="log in checkins.data" :key="log.id">
                                <td style="font-weight: 600; color: white;">{{ log.equipment?.nama_peralatan }}</td>
                                <td>{{ log.equipment?.kategori }}</td>
                                <td>
                                    <div style="font-weight: 500; color: white;">{{ new Date(log.waktu_checkin).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</div>
                                    <div style="font-size: 0.8rem; color: var(--dark-400);">{{ new Date(log.waktu_checkin).toLocaleTimeString('id-ID') }} WIB</div>
                                </td>
                                <td><StatusBadge :status="log.status" /></td>
                            </tr>
                            <tr v-if="!checkins.data?.length">
                                <td colspan="4" class="empty-state">
                                    <p>Anda belum memiliki riwayat peminjaman.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding: 16px 20px; display: flex; justify-content: center;">
                    <Pagination :links="checkins.links" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
