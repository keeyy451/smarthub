<script setup>
defineProps({
    modelValue: { type: [String, Number], default: '' },
    label: String,
    options: { type: Array, default: () => [] },
    placeholder: String,
    error: String,
    required: { type: Boolean, default: false },
    id: String,
});

defineEmits(['update:modelValue']);
</script>

<template>
    <div class="form-group">
        <label v-if="label" :for="id" class="form-label">
            {{ label }} <span v-if="required" style="color: var(--rose);">*</span>
        </label>
        <select
            :id="id"
            :value="modelValue"
            class="glass-input"
            :class="{ 'border-rose': error }"
            @change="$emit('update:modelValue', $event.target.value)"
            style="appearance: none; background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2216%22 height=%2216%22 fill=%22%2394a3b8%22 viewBox=%220 0 16 16%22><path d=%22M4.646 5.646a.5.5 0 0 1 .708 0L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z%22/></svg>'); background-repeat: no-repeat; background-position: right 14px center;"
        >
            <option value="" disabled>{{ placeholder || 'Pilih...' }}</option>
            <option v-for="opt in options" :key="opt.value" :value="opt.value">{{ opt.label }}</option>
        </select>
        <p v-if="error" class="form-error">{{ error }}</p>
    </div>
</template>

<style scoped>
.border-rose {
    border-color: var(--rose) !important;
}
select option {
    background: var(--dark-800);
    color: var(--dark-100);
}
</style>
