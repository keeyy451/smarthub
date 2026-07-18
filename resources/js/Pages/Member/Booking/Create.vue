<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import AuthenticatedLayout from '../../../Layouts/AuthenticatedLayout.vue';
import InputField from '../../../Components/InputField.vue';

const form = useForm({
    nama_ruangan: '',
    tanggal: '',
    jam_mulai: '',
    jam_selesai: '',
});

const page = usePage();
const jamMulaiError = computed(() => form.errors.jam_mulai || page.props.errors?.jam_mulai);

const submit = () => {
    form.post('/member/booking', {
        onSuccess: () => {
            // Redirect happens in controller
        }
    });
};
</script>

<template>
    <Head title="Buat Booking Baru" />
    <AuthenticatedLayout>
        <div class="container-page" style="max-width: 800px;">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                <Link href="/member/booking" class="btn btn-ghost btn-sm" style="padding: 8px;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </Link>
                <div class="page-header" style="margin-bottom: 0;">
                    <h1 class="page-title">Buat Booking</h1>
                    <p class="page-subtitle">Isi form di bawah untuk mengajukan peminjaman ruangan</p>
                </div>
            </div>

            <div class="glass-card" style="padding: 32px;">
                <form @submit.prevent="submit">
                    
                    <div style="margin-bottom: 24px; padding-bottom: 24px; border-bottom: 1px solid rgba(255,255,255,0.06);">
                        <InputField 
                            id="ruangan" 
                            v-model="form.nama_ruangan" 
                            label="Nama Ruangan" 
                            placeholder="Contoh: Studio A, Ruang Podcast, dll" 
                            :error="form.errors.nama_ruangan" 
                            required 
                        />
                    </div>

                    <div style="margin-bottom: 32px;">
                        <h4 style="font-size: 1rem; font-weight: 600; color: white; margin-bottom: 16px;">Jadwal Penggunaan</h4>
                        
                        <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                            <InputField 
                                id="tanggal" 
                                v-model="form.tanggal" 
                                type="date" 
                                label="Tanggal" 
                                :error="form.errors.tanggal" 
                                required 
                            />
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                <InputField 
                                    id="jam_mulai" 
                                    v-model="form.jam_mulai" 
                                    type="time" 
                                    label="Jam Mulai" 
                                    :error="jamMulaiError" 
                                    required 
                                />
                                <InputField 
                                    id="jam_selesai" 
                                    v-model="form.jam_selesai" 
                                    type="time" 
                                    label="Jam Selesai" 
                                    :error="form.errors.jam_selesai" 
                                    required 
                                />
                            </div>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; justify-content: flex-end;">
                        <Link href="/member/booking" class="btn btn-ghost">Batal</Link>
                        <button type="submit" class="btn btn-primary" :disabled="form.processing">
                            <svg v-if="form.processing" width="18" height="18" viewBox="0 0 24 24" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="30 70"/></svg>
                            {{ form.processing ? 'Mengirim Pengajuan...' : 'Ajukan Booking' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
