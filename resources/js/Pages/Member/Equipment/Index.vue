<script setup>
import { ref } from 'vue';
import { Head, router, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';
import Pagination from '../../../Components/Pagination.vue';
import Modal from '../../../Components/Modal.vue';

const props = defineProps({
    equipments: Object,
    categories: Array,
    filters: Object,
});

const search = ref(props.filters?.search || '');
const statusFilter = ref(props.filters?.status || '');
const categoryFilter = ref(props.filters?.kategori || '');

const doSearch = () => {
    router.get('/member/equipment', { 
        search: search.value, 
        status: statusFilter.value,
        kategori: categoryFilter.value
    }, { preserveState: true, replace: true });
};

// Check-in / Check-out handling
const showActionModal = ref(false);
const activeEquipment = ref(null);
const actionType = ref(''); // 'checkout' or 'checkin'
const form = useForm({});

const confirmAction = (equipment, type) => {
    activeEquipment.value = equipment;
    actionType.value = type;
    showActionModal.value = true;
};

const executeAction = () => {
    const url = `/member/equipment/${activeEquipment.value.id}/${actionType.value}`;
    form.post(url, {
        onSuccess: () => {
            showActionModal.value = false;
            activeEquipment.value = null;
        }
    });
};
</script>

<template>
    <Head title="Peralatan Studio" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Peminjaman Peralatan</h1>
                    <p class="page-subtitle">Cari dan pinjam peralatan studio yang tersedia</p>
                </div>
                <Link href="/member/equipment/history" class="btn btn-ghost">Riwayat Saya</Link>
            </div>

            <!-- Filters -->
            <div class="glass-card" style="padding: 16px 20px; margin-bottom: 24px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
                <div style="flex: 1; min-width: 200px;">
                    <input v-model="search" @keyup.enter="doSearch" class="glass-input" placeholder="Cari nama peralatan..." style="padding: 10px 14px; font-size: 0.85rem;" />
                </div>
                <select v-model="categoryFilter" @change="doSearch" class="glass-input" style="width: auto; min-width: 150px; padding: 10px 14px; font-size: 0.85rem; appearance: none;">
                    <option value="">Semua Kategori</option>
                    <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
                </select>
                <select v-model="statusFilter" @change="doSearch" class="glass-input" style="width: auto; min-width: 150px; padding: 10px 14px; font-size: 0.85rem; appearance: none;">
                    <option value="">Semua Status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="dipinjam">Dipinjam</option>
                </select>
                <button class="btn btn-ghost btn-sm" @click="search = ''; statusFilter = ''; categoryFilter = ''; doSearch();">Reset</button>
            </div>

            <!-- Equipment Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
                <div v-for="item in equipments.data" :key="item.id" class="glass-card" style="padding: 20px; display: flex; flex-direction: column;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <span style="font-size: 0.75rem; color: var(--sky-400); font-weight: 600; text-transform: uppercase; background: rgba(14, 165, 233, 0.1); padding: 4px 8px; border-radius: 6px;">{{ item.kategori }}</span>
                        <StatusBadge :status="item.status" />
                    </div>
                    
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 8px;">{{ item.nama_peralatan }}</h3>
                    
                    <div style="margin-bottom: 20px; flex: 1;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <span style="font-size: 0.8rem; color: var(--dark-400); width: 60px;">Kondisi:</span>
                            <StatusBadge :status="item.kondisi" />
                        </div>
                    </div>

                    <div style="margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.06);">
                        <button v-if="item.status === 'tersedia'" class="btn btn-primary" style="width: 100%;" @click="confirmAction(item, 'checkout')">
                            Pinjam Alat
                        </button>
                        <button v-else-if="item.status === 'dipinjam'" class="btn btn-warning" style="width: 100%;" @click="confirmAction(item, 'checkin')">
                            Kembalikan (Check-in)
                        </button>
                        <button v-else class="btn btn-ghost" style="width: 100%; opacity: 0.5;" disabled>
                            Tidak Tersedia
                        </button>
                    </div>
                </div>
            </div>

            <div v-if="!equipments.data?.length" class="glass-card empty-state" style="margin-top: 20px;">
                <p>Tidak ada peralatan yang sesuai dengan pencarian Anda.</p>
            </div>

            <div style="padding: 24px 0; display: flex; justify-content: center;">
                <Pagination :links="equipments.links" />
            </div>
        </div>

        <!-- Confirm Action Modal -->
        <Modal :show="showActionModal" :title="actionType === 'checkout' ? 'Konfirmasi Peminjaman' : 'Konfirmasi Pengembalian'" @close="showActionModal = false">
            <div v-if="activeEquipment" style="padding: 10px 0;">
                <div style="background: rgba(15, 23, 42, 0.6); padding: 16px; border-radius: 12px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.05);">
                    <p style="font-size: 0.85rem; color: var(--dark-400); margin-bottom: 4px;">Nama Alat:</p>
                    <p style="font-size: 1.1rem; font-weight: 600; color: white;">{{ activeEquipment.nama_peralatan }}</p>
                </div>
                
                <p v-if="actionType === 'checkout'" style="color: var(--dark-300); font-size: 0.95rem; line-height: 1.5; margin-bottom: 24px;">
                    Anda akan meminjam alat ini. Pastikan untuk menjaga kondisi alat selama peminjaman dan mengembalikannya setelah selesai digunakan.
                </p>
                <p v-else style="color: var(--dark-300); font-size: 0.95rem; line-height: 1.5; margin-bottom: 24px;">
                    Anda akan mengembalikan alat ini. Apakah Anda yakin sudah selesai menggunakan alat ini?
                </p>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <button class="btn btn-ghost" @click="showActionModal = false" :disabled="form.processing">Batal</button>
                    <button class="btn" :class="actionType === 'checkout' ? 'btn-primary' : 'btn-warning'" @click="executeAction" :disabled="form.processing">
                        <svg v-if="form.processing" width="16" height="16" viewBox="0 0 24 24" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="30 70"/></svg>
                        {{ form.processing ? 'Memproses...' : (actionType === 'checkout' ? 'Ya, Pinjam' : 'Ya, Kembalikan') }}
                    </button>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
