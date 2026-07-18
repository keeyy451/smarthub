<script setup>
import { ref, watch } from 'vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';
import Pagination from '../../../Components/Pagination.vue';
import Modal from '../../../Components/Modal.vue';
import DeleteConfirm from '../../../Components/DeleteConfirm.vue';
import InputField from '../../../Components/InputField.vue';
import SelectField from '../../../Components/SelectField.vue';

const props = defineProps({
    equipments: Object,
    filters: Object,
});

const search = ref(props.filters?.search || '');
const statusFilter = ref(props.filters?.status || '');

const doSearch = () => {
    router.get('/admin/equipments', { search: search.value, status: statusFilter.value }, { preserveState: true, replace: true });
};

// Modals
const showCreateModal = ref(false);
const showEditModal = ref(false);
const showDeleteModal = ref(false);
const deleteId = ref(null);

const createForm = useForm({
    nama_peralatan: '',
    kategori: '',
    kondisi: 'baik',
    status: 'tersedia',
    jumlah: 1,
});

const editForm = useForm({
    id: null,
    nama_peralatan: '',
    kategori: '',
    kondisi: '',
    status: '',
    jumlah: 1,
});

const deleteForm = useForm({});

const kondisiOptions = [
    { value: 'baik', label: 'Baik' },
    { value: 'rusak_ringan', label: 'Rusak Ringan' },
    { value: 'rusak_berat', label: 'Rusak Berat' },
];

const statusOptions = [
    { value: 'tersedia', label: 'Tersedia' },
    { value: 'dipinjam', label: 'Dipinjam' },
    { value: 'maintenance', label: 'Maintenance' },
];

const openEdit = (equipment) => {
    editForm.id = equipment.id;
    editForm.nama_peralatan = equipment.nama_peralatan;
    editForm.kategori = equipment.kategori;
    editForm.kondisi = equipment.kondisi;
    editForm.status = equipment.status;
    editForm.jumlah = equipment.jumlah;
    showEditModal.value = true;
};

const submitCreate = () => {
    createForm.post('/admin/equipments', {
        onSuccess: () => {
            showCreateModal.value = false;
            createForm.reset();
        },
    });
};

const submitEdit = () => {
    editForm.put(`/admin/equipments/${editForm.id}`, {
        onSuccess: () => {
            showEditModal.value = false;
            editForm.reset();
        },
    });
};

const confirmDelete = (id) => {
    deleteId.value = id;
    showDeleteModal.value = true;
};

const doDelete = () => {
    deleteForm.delete(`/admin/equipments/${deleteId.value}`, {
        onSuccess: () => {
            showDeleteModal.value = false;
            deleteId.value = null;
        },
    });
};
</script>

<template>
    <Head title="Manage Peralatan" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Peralatan</h1>
                    <p class="page-subtitle">Kelola data master peralatan studio</p>
                </div>
                <button class="btn btn-primary" @click="showCreateModal = true">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Tambah Peralatan
                </button>
            </div>

            <!-- Filters -->
            <div class="glass-card" style="padding: 16px 20px; margin-bottom: 20px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
                <div style="flex: 1; min-width: 200px;">
                    <input v-model="search" @keyup.enter="doSearch" class="glass-input" placeholder="Cari nama peralatan..." style="padding: 10px 14px; font-size: 0.85rem;" />
                </div>
                <select v-model="statusFilter" @change="doSearch" class="glass-input" style="width: auto; min-width: 150px; padding: 10px 14px; font-size: 0.85rem;">
                    <option value="">Semua Status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="maintenance">Maintenance</option>
                </select>
                <button class="btn btn-ghost btn-sm" @click="search = ''; statusFilter = ''; doSearch();">Reset</button>
            </div>

            <!-- Table -->
            <div class="glass-card" style="overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Peralatan</th>
                                <th>Kategori</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in equipments.data" :key="item.id">
                                <td style="color: var(--dark-500);">{{ equipments.from + index }}</td>
                                <td style="font-weight: 600; color: white;">{{ item.nama_peralatan }}</td>
                                <td>{{ item.kategori }}</td>
                                <td><StatusBadge :status="item.kondisi" /></td>
                                <td><StatusBadge :status="item.status" /></td>
                                <td>{{ item.jumlah }}</td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <button class="btn btn-warning btn-xs" @click="openEdit(item)">Edit</button>
                                        <button class="btn btn-danger btn-xs" @click="confirmDelete(item.id)">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="!equipments.data?.length">
                                <td colspan="7" class="empty-state">
                                    <p>Tidak ada data peralatan ditemukan.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding: 16px 20px; display: flex; justify-content: center;">
                    <Pagination :links="equipments.links" />
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <Modal :show="showCreateModal" title="Tambah Peralatan" @close="showCreateModal = false">
            <form @submit.prevent="submitCreate">
                <InputField id="create-nama" v-model="createForm.nama_peralatan" label="Nama Peralatan" placeholder="Contoh: Canon EOS R5" :error="createForm.errors.nama_peralatan" required />
                <InputField id="create-kategori" v-model="createForm.kategori" label="Kategori" placeholder="Contoh: Kamera" :error="createForm.errors.kategori" required />
                <SelectField id="create-kondisi" v-model="createForm.kondisi" label="Kondisi" :options="kondisiOptions" :error="createForm.errors.kondisi" required />
                <SelectField id="create-status" v-model="createForm.status" label="Status" :options="statusOptions" :error="createForm.errors.status" required />
                <InputField id="create-jumlah" v-model="createForm.jumlah" type="number" label="Jumlah" :error="createForm.errors.jumlah" required />
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <button type="button" class="btn btn-ghost" @click="showCreateModal = false">Batal</button>
                    <button type="submit" class="btn btn-primary" :disabled="createForm.processing">
                        {{ createForm.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </Modal>

        <!-- Edit Modal -->
        <Modal :show="showEditModal" title="Edit Peralatan" @close="showEditModal = false">
            <form @submit.prevent="submitEdit">
                <InputField id="edit-nama" v-model="editForm.nama_peralatan" label="Nama Peralatan" :error="editForm.errors.nama_peralatan" required />
                <InputField id="edit-kategori" v-model="editForm.kategori" label="Kategori" :error="editForm.errors.kategori" required />
                <SelectField id="edit-kondisi" v-model="editForm.kondisi" label="Kondisi" :options="kondisiOptions" :error="editForm.errors.kondisi" required />
                <SelectField id="edit-status" v-model="editForm.status" label="Status" :options="statusOptions" :error="editForm.errors.status" required />
                <InputField id="edit-jumlah" v-model="editForm.jumlah" type="number" label="Jumlah" :error="editForm.errors.jumlah" required />
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <button type="button" class="btn btn-ghost" @click="showEditModal = false">Batal</button>
                    <button type="submit" class="btn btn-primary" :disabled="editForm.processing">
                        {{ editForm.processing ? 'Memperbarui...' : 'Perbarui' }}
                    </button>
                </div>
            </form>
        </Modal>

        <!-- Delete Confirm -->
        <DeleteConfirm :show="showDeleteModal" @close="showDeleteModal = false" @confirm="doDelete" :processing="deleteForm.processing" />
    </AuthenticatedLayout>
</template>
