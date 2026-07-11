<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: { type: Array, required: true },
});
</script>

<template>
    <div class="pagination" v-if="links.length > 3">
        <template v-for="(link, index) in links" :key="index">
            <Link
                v-if="link.url"
                :href="link.url"
                class="pagination-btn"
                :class="{ active: link.active }"
                v-html="link.label"
                preserve-scroll
            />
            <span
                v-else
                class="pagination-btn"
                :class="{ active: link.active }"
                style="opacity: 0.3; cursor: not-allowed;"
                v-html="link.label"
            />
        </template>
    </div>
</template>
