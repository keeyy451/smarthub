<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import GuestLayout from '../../Layouts/GuestLayout.vue';
import InputField from '../../Components/InputField.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />
    <GuestLayout>
        <h2 style="font-size: 1.3rem; font-weight: 700; color: white; margin-bottom: 4px;">Selamat Datang</h2>
        <p style="font-size: 0.85rem; color: var(--dark-400); margin-bottom: 28px;">Masuk ke akun SmartHub Anda</p>

        <form @submit.prevent="submit">
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
                placeholder="••••••••"
                :error="form.errors.password"
                required
            />

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.85rem; color: var(--dark-400);">
                    <input type="checkbox" v-model="form.remember" style="accent-color: var(--sky-500);">
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;" :disabled="form.processing">
                <svg v-if="form.processing" width="18" height="18" viewBox="0 0 24 24" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="30 70"/></svg>
                {{ form.processing ? 'Masuk...' : 'Masuk' }}
            </button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <p style="font-size: 0.85rem; color: var(--dark-500);">
                Belum punya akun?
                <a href="/register" style="color: var(--sky-400); text-decoration: none; font-weight: 600;">Daftar</a>
            </p>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes spin { to { transform: rotate(360deg); } }
</style>
