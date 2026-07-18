<script setup>
import { ref } from 'vue';

const props = defineProps({
    show: { type: Boolean, default: false },
    title: { type: String, default: '' },
    maxWidth: { type: String, default: '540px' },
});

const emit = defineEmits(['close']);

const close = () => {
    emit('close');
};
</script>

<template>
    <teleport to="body">
        <transition name="modal">
            <div v-if="show" class="modal-overlay" @click.self="close">
                <div class="modal-content" :style="{ maxWidth: maxWidth }">
                    <div v-if="title" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                        <h2 style="font-size: 1.2rem; font-weight: 700; color: white;">{{ title }}</h2>
                        <button @click="close" style="background: none; border: none; color: var(--dark-400); cursor: pointer; padding: 4px; border-radius: 8px; transition: all 0.2s;" onmouseover="this.style.color='white';this.style.background='rgba(255,255,255,0.08)'" onmouseout="this.style.color='var(--dark-400)';this.style.background='none'">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <slot />
                </div>
            </div>
        </transition>
    </teleport>
</template>
