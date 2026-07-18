<script setup>
defineProps({
    modelValue: { type: [String, Number], default: '' },
    label: String,
    type: { type: String, default: 'text' },
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
        <input
            :id="id"
            :type="type"
            :value="modelValue"
            :placeholder="placeholder"
            class="glass-input"
            :class="{ 'border-rose': error }"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <p v-if="error" class="form-error">{{ error }}</p>
    </div>
</template>

<style scoped>
.border-rose {
    border-color: var(--rose) !important;
}
</style>
