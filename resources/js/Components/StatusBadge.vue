<script setup>
defineProps({
    status: { type: String, required: true },
});

const labels = {
    tersedia: 'Tersedia',
    dipinjam: 'Dipinjam',
    maintenance: 'Maintenance',
    baik: 'Baik',
    rusak_ringan: 'Rusak Ringan',
    rusak_berat: 'Rusak Berat',
    pending: 'Pending',
    approved: 'Approved',
    rejected: 'Rejected',
    selesai: 'Selesai',
    checked_in: 'Checked In',
    checked_out: 'Checked Out',
};
</script>

<template>
    <span class="badge" :class="`badge-${status}`">
        <span style="width: 6px; height: 6px; border-radius: 50%; background: currentColor;"></span>
        {{ labels[status] || status }}
    </span>
</template>
