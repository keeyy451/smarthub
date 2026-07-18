<script setup>
defineProps({
    show: { type: Boolean, default: false },
    title: { type: String, default: 'Konfirmasi Hapus' },
    message: { type: String, default: 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.' },
    processing: { type: Boolean, default: false },
});

const emit = defineEmits(['close', 'confirm']);
</script>

<template>
    <teleport to="body">
        <transition name="modal">
            <div v-if="show" class="modal-overlay" @click.self="$emit('close')">
                <div class="modal-content" style="max-width: 420px; text-align: center;">
                    <div style="width: 56px; height: 56px; background: rgba(244, 63, 94, 0.12); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="var(--rose)" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 8px;">{{ title }}</h3>
                    <p style="font-size: 0.9rem; color: var(--dark-400); margin-bottom: 28px; line-height: 1.6;">{{ message }}</p>
                    <div style="display: flex; gap: 12px; justify-content: center;">
                        <button class="btn btn-ghost" @click="$emit('close')">Batal</button>
                        <button class="btn btn-danger" @click="$emit('confirm')" :disabled="processing">
                            <svg v-if="processing" width="16" height="16" viewBox="0 0 24 24" style="animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="30 70"/></svg>
                            {{ processing ? 'Menghapus...' : 'Ya, Hapus' }}
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </teleport>
</template>

<style scoped>
@keyframes spin {
    to { transform: rotate(360deg); }
}
</style>
