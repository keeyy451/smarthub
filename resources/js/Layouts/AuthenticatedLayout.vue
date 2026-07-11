<script setup>
import { ref, computed } from 'vue';
import { router, usePage, Link } from '@inertiajs/vue3';
import Alert from '../Components/Alert.vue';

const page = usePage();
const user = computed(() => page.props.auth?.user);
const isAdmin = computed(() => user.value?.role === 'admin');
const sidebarOpen = ref(false);

const flash = computed(() => ({
    success: page.props.flash?.success,
    error: page.props.flash?.error,
}));

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const closeSidebar = () => {
    sidebarOpen.value = false;
};

const logout = () => {
    router.post('/logout');
};

const isActive = (pattern) => {
    const url = page.url;
    if (Array.isArray(pattern)) {
        return pattern.some(p => url.startsWith(p));
    }
    return url.startsWith(pattern);
};

// Admin navigation
const adminNav = [
    { href: '/dashboard', label: 'Dashboard', icon: 'dashboard', pattern: '/dashboard' },
    { href: '/admin/equipments', label: 'Peralatan', icon: 'equipment', pattern: '/admin/equipments' },
    { href: '/admin/bookings', label: 'Booking Ruangan', icon: 'booking', pattern: '/admin/bookings' },
    { href: '/admin/checkins', label: 'Log Check-in', icon: 'checkin', pattern: '/admin/checkins' },
];

// Member navigation
const memberNav = [
    { href: '/member', label: 'Dashboard', icon: 'dashboard', pattern: '/member' },
    { href: '/member/equipment', label: 'Peralatan', icon: 'equipment', pattern: '/member/equipment' },
    { href: '/member/booking', label: 'Booking Ruangan', icon: 'booking', pattern: '/member/booking' },
];

const navItems = computed(() => isAdmin.value ? adminNav : memberNav);
</script>

<template>
    <div class="bg-gradient-main min-h-screen">
        <!-- Sidebar Overlay (Mobile) -->
        <div
            class="sidebar-overlay"
            :class="{ active: sidebarOpen }"
            @click="closeSidebar"
        ></div>

        <!-- Sidebar -->
        <aside class="sidebar" :class="{ open: sidebarOpen }">
            <!-- Logo -->
            <div style="padding: 24px 20px; border-bottom: 1px solid rgba(255,255,255,0.06);">
                <Link href="/" style="text-decoration: none; display: flex; align-items: center; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--sky-500), var(--sky-700)); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-weight: 700; font-size: 1.2rem; color: white; letter-spacing: -0.02em;">SmartHub</div>
                        <div style="font-size: 0.7rem; color: var(--dark-500); text-transform: uppercase; letter-spacing: 0.08em;">Management System</div>
                    </div>
                </Link>
            </div>

            <!-- Navigation -->
            <nav style="padding: 16px 12px; flex: 1;">
                <div style="font-size: 0.7rem; font-weight: 600; color: var(--dark-600); text-transform: uppercase; letter-spacing: 0.1em; padding: 0 16px; margin-bottom: 12px;">
                    {{ isAdmin ? 'ADMIN MENU' : 'MEMBER MENU' }}
                </div>

                <Link
                    v-for="item in navItems"
                    :key="item.href"
                    :href="item.href"
                    class="nav-item"
                    :class="{ active: isActive(item.pattern) }"
                    @click="closeSidebar"
                >
                    <!-- Dashboard -->
                    <svg v-if="item.icon === 'dashboard'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <!-- Equipment -->
                    <svg v-if="item.icon === 'equipment'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <!-- Booking -->
                    <svg v-if="item.icon === 'booking'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <!-- Checkin -->
                    <svg v-if="item.icon === 'checkin'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    {{ item.label }}
                </Link>

                <!-- Profile Link -->
                <div style="margin-top: 24px; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 16px;">
                    <div style="font-size: 0.7rem; font-weight: 600; color: var(--dark-600); text-transform: uppercase; letter-spacing: 0.1em; padding: 0 16px; margin-bottom: 12px;">
                        AKUN
                    </div>
                    <Link href="/profile" class="nav-item" :class="{ active: isActive('/profile') }" @click="closeSidebar">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile
                    </Link>
                </div>
            </nav>

            <!-- User Info -->
            <div style="padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.06);">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--sky-500), var(--violet)); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; color: white;">
                        {{ user?.name?.charAt(0)?.toUpperCase() }}
                    </div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-weight: 600; font-size: 0.85rem; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ user?.name }}</div>
                        <div style="font-size: 0.75rem; color: var(--dark-500); text-transform: capitalize;">{{ user?.role }}</div>
                    </div>
                    <button @click="logout" class="btn-ghost btn-xs" style="padding: 6px; border-radius: 8px;" title="Logout">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar (Mobile) -->
            <header style="padding: 16px 24px; display: flex; align-items: center; justify-content: space-between;" class="lg:hidden">
                <button @click="toggleSidebar" style="background: none; border: none; color: white; cursor: pointer; padding: 4px;">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div style="font-weight: 700; font-size: 1.1rem; color: white;">SmartHub</div>
                <div style="width: 28px;"></div>
            </header>

            <!-- Flash Messages -->
            <div class="container-page" style="padding-bottom: 0;" v-if="flash.success || flash.error">
                <Alert v-if="flash.success" type="success" :message="flash.success" />
                <Alert v-if="flash.error" type="error" :message="flash.error" />
            </div>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>

    <style scoped>
    .lg\:hidden {
        display: flex;
    }
    @media (min-width: 1024px) {
        .lg\:hidden {
            display: none;
        }
    }
    </style>
</template>
