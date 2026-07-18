<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';
import Pagination from '../../../Components/Pagination.vue';
import DeleteConfirm from '../../../Components/DeleteConfirm.vue';

defineProps({
    bookings: Object,
});

const form = useForm({});
const showCancelModal = ref(false);
const cancelId = ref(null);

const confirmCancel = (id) => {
    cancelId.value = id;
    showCancelModal.value = true;
};

const doCancel = () => {
    form.delete(`/member/booking/${cancelId.value}`, {
        onSuccess: () => {
            showCancelModal.value = false;
            cancelId.value = null;
        }
    });
};
</script>

<template>
    <Head title="Booking Ruangan" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Booking Ruangan</h1>
                    <p class="page-subtitle">Kelola pengajuan booking ruangan Anda</p>
                </div>
                <Link href="/member/booking/create" class="btn btn-primary">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Booking Baru
                </Link>
            </div>

            <!-- Booking Cards -->
            <div v-if="bookings.data?.length" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px;">
                <div v-for="booking in bookings.data" :key="booking.id" class="glass-card" style="padding: 24px; position: relative; overflow: hidden;">
                    <!-- Status line accent -->
                    <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%;" :style="{
                        background: booking.status === 'pending' ? 'var(--amber)' :
                                   booking.status === 'approved' ? 'var(--emerald)' :
                                   booking.status === 'rejected' ? 'var(--rose)' : 'var(--dark-500)'
                    }"></div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; padding-left: 12px;">
                        <div>
                            <h3 style="font-size: 1.2rem; font-weight: 700; color: white;">{{ booking.nama_ruangan }}</h3>
                            <p style="font-size: 0.85rem; color: var(--dark-400); margin-top: 4px;">Diajukan: {{ new Date(booking.created_at).toLocaleDateString('id-ID') }}</p>
                        </div>
                        <StatusBadge :status="booking.status" />
                    </div>

                    <div style="background: rgba(15, 23, 42, 0.4); border-radius: 12px; padding: 16px; margin-bottom: 20px; border: 1px solid rgba(255,255,255,0.05); padding-left: 28px;">
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--sky-400)" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <div>
                                    <div style="font-size: 0.75rem; color: var(--dark-400);">Tanggal</div>
                                    <div style="font-weight: 600; color: white;">{{ new Date(booking.tanggal).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</div>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="var(--violet)" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div>
                                    <div style="font-size: 0.75rem; color: var(--dark-400);">Waktu</div>
                                    <div style="font-weight: 600; color: white;">{{ booking.jam_mulai.substring(0,5) }} - {{ booking.jam_selesai.substring(0,5) }} WIB</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="booking.status === 'pending'" style="padding-left: 12px;">
                        <button class="btn btn-ghost" style="width: 100%; border-color: rgba(244, 63, 94, 0.3); color: var(--rose);" @click="confirmCancel(booking.id)">
                            Batalkan Pengajuan
                        </button>
                    </div>
                    <div v-else-if="booking.status === 'approved'" style="padding-left: 12px; text-align: center; color: var(--emerald); font-size: 0.85rem; font-weight: 500;">
                        Ruangan siap digunakan sesuai jadwal.
                    </div>
                </div>
            </div>

            <div v-if="!bookings.data?.length" class="glass-card empty-state" style="margin-top: 20px;">
                <p>Anda belum pernah mengajukan booking ruangan.</p>
                <Link href="/member/booking/create" class="btn btn-primary" style="margin-top: 16px;">Buat Booking Pertama</Link>
            </div>

            <div style="padding: 24px 0; display: flex; justify-content: center;">
                <Pagination :links="bookings.links" />
            </div>
        </div>

        <DeleteConfirm 
            :show="showCancelModal" 
            title="Batalkan Booking" 
            message="Apakah Anda yakin ingin membatalkan pengajuan booking ini?" 
            @close="showCancelModal = false" 
            @confirm="doCancel" 
            :processing="form.processing" 
        />
    </AuthenticatedLayout>
</template>
