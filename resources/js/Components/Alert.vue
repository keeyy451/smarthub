<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    type: { type: String, default: 'success' },
    message: { type: String, required: true },
});

const visible = ref(true);

// Auto-hide after 5 seconds
setTimeout(() => { visible.value = false; }, 5000);
</script>

<template>
    <transition name="alert">
        <div v-if="visible" class="alert" :class="`alert-${type}`">
            <svg v-if="type === 'success'" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <svg v-if="type === 'error'" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <svg v-if="type === 'warning'" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <span style="flex: 1;">{{ message }}</span>
            <button @click="visible = false" style="background: none; border: none; color: inherit; cursor: pointer; opacity: 0.6; padding: 0;">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </transition>
</template>
