<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '../../Layouts/AuthenticatedLayout.vue';
import InputField from '../../Components/InputField.vue';

const props = defineProps({
    user: Object,
});

const profileForm = useForm({
    name: props.user.name,
    email: props.user.email,
});

const passwordForm = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const deleteForm = useForm({
    password: '',
});

const updateProfile = () => {
    profileForm.patch('/profile', {
        preserveScroll: true,
    });
};

const updatePassword = () => {
    passwordForm.put('/password', {
        preserveScroll: true,
        onSuccess: () => passwordForm.reset(),
        onError: () => {
            if (passwordForm.errors.password) {
                passwordForm.reset('password', 'password_confirmation');
            }
            if (passwordForm.errors.current_password) {
                passwordForm.reset('current_password');
            }
        },
    });
};
</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <div class="container-page" style="max-width: 800px;">
            <div class="page-header">
                <h1 class="page-title">Profile</h1>
                <p class="page-subtitle">Kelola informasi akun dan pengaturan keamanan Anda</p>
            </div>

            <div style="display: flex; flex-direction: column; gap: 32px;">
                <!-- Profile Information -->
                <div class="glass-card" style="padding: 32px;">
                    <div style="margin-bottom: 24px;">
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: white;">Informasi Profil</h3>
                        <p style="font-size: 0.85rem; color: var(--dark-400); margin-top: 4px;">Perbarui nama akun dan alamat email Anda.</p>
                    </div>

                    <form @submit.prevent="updateProfile" style="max-width: 500px;">
                        <InputField id="name" v-model="profileForm.name" label="Nama Lengkap" :error="profileForm.errors.name" required />
                        <InputField id="email" v-model="profileForm.email" type="email" label="Email" :error="profileForm.errors.email" required />
                        
                        <div style="display: flex; align-items: center; gap: 16px; margin-top: 8px;">
                            <button class="btn btn-primary" :disabled="profileForm.processing">Simpan Perubahan</button>
                            <transition name="alert">
                                <span v-if="profileForm.recentlySuccessful" style="font-size: 0.85rem; color: var(--emerald); font-weight: 500;">Tersimpan.</span>
                            </transition>
                        </div>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="glass-card" style="padding: 32px;">
                    <div style="margin-bottom: 24px;">
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: white;">Perbarui Password</h3>
                        <p style="font-size: 0.85rem; color: var(--dark-400); margin-top: 4px;">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                    </div>

                    <form @submit.prevent="updatePassword" style="max-width: 500px;">
                        <InputField id="current_password" v-model="passwordForm.current_password" type="password" label="Password Saat Ini" :error="passwordForm.errors.current_password" required />
                        <InputField id="password" v-model="passwordForm.password" type="password" label="Password Baru" :error="passwordForm.errors.password" required />
                        <InputField id="password_confirmation" v-model="passwordForm.password_confirmation" type="password" label="Konfirmasi Password Baru" :error="passwordForm.errors.password_confirmation" required />
                        
                        <div style="display: flex; align-items: center; gap: 16px; margin-top: 8px;">
                            <button class="btn btn-primary" :disabled="passwordForm.processing">Perbarui Password</button>
                            <transition name="alert">
                                <span v-if="passwordForm.recentlySuccessful" style="font-size: 0.85rem; color: var(--emerald); font-weight: 500;">Tersimpan.</span>
                            </transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
