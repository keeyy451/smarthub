<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import GuestLayout from '../../Layouts/GuestLayout.vue';
import InputField from '../../Components/InputField.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />
    <GuestLayout>
        <h2 style="font-size: 1.3rem; font-weight: 700; color: white; margin-bottom: 4px;">Buat Akun</h2>
        <p style="font-size: 0.85rem; color: var(--dark-400); margin-bottom: 28px;">Daftar akun SmartHub baru</p>

        <form @submit.prevent="submit">
            <InputField
                id="name"
                v-model="form.name"
                label="Nama Lengkap"
                placeholder="Nama Anda"
                :error="form.errors.name"
                required
            />

            <InputField
                id="email"
                v-model="form.email"
                type="email"
                label="Email"
                placeholder="nama@email.com"
                :error="form.errors.email"
                required
            />

            <InputField
                id="password"
                v-model="form.password"
                type="password"
                label="Password"
                placeholder="Minimal 8 karakter"
                :error="form.errors.password"
                required
            />

            <InputField
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                label="Konfirmasi Password"
                placeholder="Ulangi password"
                :error="form.errors.password_confirmation"
                required
            />

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; margin-top: 8px;" :disabled="form.processing">
                <svg v-if="form.processing" width="18" height="18" viewBox="0 0 24 24" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="30 70"/></svg>
                {{ form.processing ? 'Mendaftar...' : 'Daftar' }}
            </button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <p style="font-size: 0.85rem; color: var(--dark-500);">
                Sudah punya akun?
                <a href="/login" style="color: var(--sky-400); text-decoration: none; font-weight: 600;">Masuk</a>
            </p>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes spin { to { transform: rotate(360deg); } }
</style>
