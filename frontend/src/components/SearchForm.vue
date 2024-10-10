<template>
    <div class="p-4 bg-gray-100 rounded shadow-md mb-4">
        <form @submit.prevent="search" class="flex space-x-4">
            <input
                v-model="query"
                type="text"
                placeholder="Search Truck or Trailer..."
                class="flex-grow px-4 py-2 border border-gray-300 rounded-md shadow-sm outline-none sm:text-sm"
            />
            <button
                type="submit"
                class="px-4 py-2 bg-blue-800 text-white rounded hover:bg-opacity-70 transition duration-100 ease-in"
            >
                Search
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";

const query = ref("");

const emit = defineEmits(["searched"]);

const search = () => {
    emit("searched", query.value);
};
</script>
