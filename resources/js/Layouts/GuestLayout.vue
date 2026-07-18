<script setup>
</script>

<template>
    <div class="bg-gradient-auth min-h-screen flex items-center justify-center p-4" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 16px;">
        <div style="width: 100%; max-width: 440px;" class="animate-slide-up">
            <!-- Logo -->
            <div style="text-align: center; margin-bottom: 32px;">
                <div style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--sky-500), var(--sky-700)); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h1 style="font-weight: 700; font-size: 1.5rem; color: white; letter-spacing: -0.02em;">SmartHub</h1>
                <p style="font-size: 0.85rem; color: var(--dark-500); margin-top: 4px;">Management System</p>
            </div>

            <!-- Content -->
            <div class="glass-card" style="padding: 32px;">
                <slot />
            </div>
        </div>
    </div>
</template>
