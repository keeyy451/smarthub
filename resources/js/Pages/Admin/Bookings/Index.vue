<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import StatusBadge from '../../../Components/StatusBadge.vue';
import Pagination from '../../../Components/Pagination.vue';
import Modal from '../../../Components/Modal.vue';
import DeleteConfirm from '../../../Components/DeleteConfirm.vue';
import InputField from '../../../Components/InputField.vue';
import SelectField from '../../../Components/SelectField.vue';

const props = defineProps({
    bookings: Object,
    users: Array,
});

// Modals
const showCreateModal = ref(false);
const showEditModal = ref(false);
const showDeleteModal = ref(false);
const showStatusModal = ref(false);
const activeId = ref(null);

const createForm = useForm({
    user_id: '',
    nama_ruangan: '',
    tanggal: '',
    jam_mulai: '',
    jam_selesai: '',
    status: 'pending',
});

const editForm = useForm({
    id: null,
    nama_ruangan: '',
    tanggal: '',
    jam_mulai: '',
    jam_selesai: '',
    status: '',
});

const statusForm = useForm({
    status: '',
});

const deleteForm = useForm({});

const statusOptions = [
    { value: 'pending', label: 'Pending' },
    { value: 'approved', label: 'Approved' },
    { value: 'rejected', label: 'Rejected' },
    { value: 'selesai', label: 'Selesai' },
];

const openEdit = (booking) => {
    editForm.id = booking.id;
    editForm.nama_ruangan = booking.nama_ruangan;
    editForm.tanggal = booking.tanggal.split('T')[0]; // Format for input type="date"
    editForm.jam_mulai = booking.jam_mulai;
    editForm.jam_selesai = booking.jam_selesai;
    editForm.status = booking.status;
    showEditModal.value = true;
};

const openStatusUpdate = (booking) => {
    activeId.value = booking.id;
    statusForm.status = booking.status;
    showStatusModal.value = true;
};

const confirmDelete = (id) => {
    activeId.value = id;
    showDeleteModal.value = true;
};

const submitCreate = () => {
    createForm.post('/admin/bookings', {
        onSuccess: () => {
            showCreateModal.value = false;
            createForm.reset();
        },
    });
};

const submitEdit = () => {
    editForm.put(`/admin/bookings/${editForm.id}`, {
        onSuccess: () => {
            showEditModal.value = false;
            editForm.reset();
        },
    });
};

const submitStatus = () => {
    statusForm.patch(`/admin/bookings/${activeId.value}/status`, {
        onSuccess: () => {
            showStatusModal.value = false;
            activeId.value = null;
        },
    });
};

const doDelete = () => {
    deleteForm.delete(`/admin/bookings/${activeId.value}`, {
        onSuccess: () => {
            showDeleteModal.value = false;
            activeId.value = null;
        },
    });
};
</script>

<template>
    <Head title="Manage Booking Ruangan" />
    <AuthenticatedLayout>
        <div class="container-page">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Booking Ruangan</h1>
                    <p class="page-subtitle">Kelola pemesanan ruangan oleh member</p>
                </div>
                <button class="btn btn-primary" @click="showCreateModal = true">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Booking Baru
                </button>
            </div>

            <!-- Table -->
            <div class="glass-card" style="overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Peminjam</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in bookings.data" :key="item.id">
                                <td style="color: var(--dark-500);">{{ bookings.from + index }}</td>
                                <td>
                                    <div style="font-weight: 600; color: white;">{{ item.user?.name }}</div>
                                    <div style="font-size: 0.75rem; color: var(--dark-400);">{{ item.user?.email }}</div>
                                </td>
                                <td style="font-weight: 500;">{{ item.nama_ruangan }}</td>
                                <td>{{ new Date(item.tanggal).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                                <td style="font-family: monospace;">{{ item.jam_mulai.substring(0, 5) }} - {{ item.jam_selesai.substring(0, 5) }}</td>
                                <td>
                                    <button style="background: none; border: none; cursor: pointer; padding: 0;" @click="openStatusUpdate(item)" title="Klik untuk ubah status">
                                        <StatusBadge :status="item.status" style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                                    </button>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <button class="btn btn-warning btn-xs" @click="openEdit(item)">Edit</button>
                                        <button class="btn btn-danger btn-xs" @click="confirmDelete(item.id)">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="!bookings.data?.length">
                                <td colspan="7" class="empty-state">
                                    <p>Tidak ada data booking ruangan.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding: 16px 20px; display: flex; justify-content: center;">
                    <Pagination :links="bookings.links" />
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <Modal :show="showCreateModal" title="Buat Booking Baru" @close="showCreateModal = false">
            <form @submit.prevent="submitCreate">
                <SelectField 
                    id="create-user" 
                    v-model="createForm.user_id" 
                    label="Pilih Member" 
                    :options="users.map(u => ({ value: u.id, label: u.name + ' (' + u.email + ')' }))" 
                    :error="createForm.errors.user_id" 
                    required 
                />
                <InputField id="create-ruangan" v-model="createForm.nama_ruangan" label="Nama Ruangan" placeholder="Misal: Studio A, Ruang Meeting 1" :error="createForm.errors.nama_ruangan" required />
                <InputField id="create-tanggal" v-model="createForm.tanggal" type="date" label="Tanggal" :error="createForm.errors.tanggal" required />
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <InputField id="create-mulai" v-model="createForm.jam_mulai" type="time" label="Jam Mulai" :error="createForm.errors.jam_mulai" required />
                    <InputField id="create-selesai" v-model="createForm.jam_selesai" type="time" label="Jam Selesai" :error="createForm.errors.jam_selesai" required />
                </div>
                
                <SelectField id="create-status" v-model="createForm.status" label="Status" :options="statusOptions" :error="createForm.errors.status" required />
                
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <button type="button" class="btn btn-ghost" @click="showCreateModal = false">Batal</button>
                    <button type="submit" class="btn btn-primary" :disabled="createForm.processing">
                        {{ createForm.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </Modal>

        <!-- Edit Modal -->
        <Modal :show="showEditModal" title="Edit Booking" @close="showEditModal = false">
            <form @submit.prevent="submitEdit">
                <InputField id="edit-ruangan" v-model="editForm.nama_ruangan" label="Nama Ruangan" :error="editForm.errors.nama_ruangan" required />
                <InputField id="edit-tanggal" v-model="editForm.tanggal" type="date" label="Tanggal" :error="editForm.errors.tanggal" required />
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <InputField id="edit-mulai" v-model="editForm.jam_mulai" type="time" label="Jam Mulai" :error="editForm.errors.jam_mulai" required />
                    <InputField id="edit-selesai" v-model="editForm.jam_selesai" type="time" label="Jam Selesai" :error="editForm.errors.jam_selesai" required />
                </div>
                
                <SelectField id="edit-status" v-model="editForm.status" label="Status" :options="statusOptions" :error="editForm.errors.status" required />
                
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <button type="button" class="btn btn-ghost" @click="showEditModal = false">Batal</button>
                    <button type="submit" class="btn btn-primary" :disabled="editForm.processing">
                        {{ editForm.processing ? 'Memperbarui...' : 'Perbarui' }}
                    </button>
                </div>
            </form>
        </Modal>

        <!-- Status Update Modal -->
        <Modal :show="showStatusModal" title="Update Status Booking" maxWidth="400px" @close="showStatusModal = false">
            <form @submit.prevent="submitStatus">
                <SelectField id="update-status" v-model="statusForm.status" label="Pilih Status Baru" :options="statusOptions" :error="statusForm.errors.status" required />
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <button type="button" class="btn btn-ghost" @click="showStatusModal = false">Batal</button>
                    <button type="submit" class="btn btn-primary" :disabled="statusForm.processing">Update</button>
                </div>
            </form>
        </Modal>

        <!-- Delete Confirm -->
        <DeleteConfirm :show="showDeleteModal" @close="showDeleteModal = false" @confirm="doDelete" :processing="deleteForm.processing" />
    </AuthenticatedLayout>
</template>
