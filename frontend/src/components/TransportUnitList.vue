<template>
    <div class="mt-4">
        <div v-if="units.length === 0" class="text-gray-500">
            No transport units available.
        </div>
        <ul v-else>
            <li
                v-for="unit in units"
                :key="unit.id"
                class="mb-4 p-4 bg-white rounded shadow-md"
            >
                <div class="text-lg font-medium">{{ unit.name }}</div>
                <div class="text-gray-500">{{ unit.type }}</div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
    units: {
        type: Array,
        required: true,
    },
});
</script>
