<script setup>
defineProps({
    label: String,
    value: [String, Number],
    icon: { type: String, default: 'default' },
    color: { type: String, default: 'sky' },
});
</script>

<template>
    <div class="glass-card stat-card" :class="color">
        <div style="display: flex; align-items: flex-start; justify-content: space-between;">
            <div>
                <p style="font-size: 0.8rem; font-weight: 500; color: var(--dark-400); margin-bottom: 8px;">{{ label }}</p>
                <p style="font-size: 2rem; font-weight: 700; color: white; letter-spacing: -0.02em; line-height: 1;">{{ value }}</p>
            </div>
            <div style="width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center;" :style="{
                background: color === 'sky' ? 'rgba(14, 165, 233, 0.15)' :
                             color === 'emerald' ? 'rgba(16, 185, 129, 0.15)' :
                             color === 'amber' ? 'rgba(245, 158, 11, 0.15)' :
                             color === 'rose' ? 'rgba(244, 63, 94, 0.15)' :
                             color === 'violet' ? 'rgba(139, 92, 246, 0.15)' : 'rgba(14, 165, 233, 0.15)'
            }">
                <slot name="icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" :style="{
                        color: color === 'sky' ? 'var(--sky-400)' :
                               color === 'emerald' ? 'var(--emerald)' :
                               color === 'amber' ? 'var(--amber)' :
                               color === 'rose' ? 'var(--rose)' :
                               color === 'violet' ? 'var(--violet)' : 'var(--sky-400)'
                    }">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </slot>
            </div>
        </div>
    </div>
</template>
