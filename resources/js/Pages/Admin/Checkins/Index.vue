<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';
import Pagination from '../../../Components/Pagination.vue';

defineProps({
    checkins: Object,
});
</script>

<template>
    <Head title="Log Check-in Peralatan" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div class="page-header">
                <h1 class="page-title">Log Check-in / Check-out</h1>
                <p class="page-subtitle">Riwayat peminjaman dan pengembalian peralatan oleh member</p>
            </div>

            <div class="glass-card" style="overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Waktu Akses</th>
                                <th>Member</th>
                                <th>Peralatan</th>
                                <th>Kategori</th>
                                <th>Aksi (Status)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in checkins.data" :key="item.id">
                                <td>
                                    <div style="font-weight: 500; color: white;">{{ new Date(item.waktu_checkin).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }) }}</div>
                                    <div style="font-size: 0.8rem; color: var(--dark-400);">{{ new Date(item.waktu_checkin).toLocaleTimeString('id-ID') }}</div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: white;">{{ item.user?.name }}</div>
                                </td>
                                <td style="font-weight: 500;">{{ item.equipment?.nama_peralatan }}</td>
                                <td><span style="font-size: 0.85rem; padding: 4px 10px; background: rgba(255,255,255,0.05); border-radius: 6px;">{{ item.equipment?.kategori }}</span></td>
                                <td><StatusBadge :status="item.status" /></td>
                            </tr>
                            <tr v-if="!checkins.data?.length">
                                <td colspan="5" class="empty-state">
                                    <p>Belum ada aktivitas log check-in/out.</p>
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
