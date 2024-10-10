<template>
    <div class="p-4 bg-gray-100 rounded shadow-md mb-4">
        <form @submit.prevent="createTransportUnit">
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Name</label
                >
                <input
                    v-model="name"
                    id="name"
                    type="text"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm px-4 py-2"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    for="type"
                    class="block text-sm font-medium text-gray-700"
                    >Type</label
                >
                <select
                    v-model="type"
                    id="type"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm px-4 py-2"
                    required
                >
                    <option value="trailer">Trailer</option>
                    <option value="truck">Truck</option>
                </select>
            </div>
            <button
                type="submit"
                class="px-4 py-2 bg-blue-800 text-white rounded hover:bg-opacity-70 transition duration-100 ease-in"
            >
                Create
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref, defineEmits } from "vue";
import axios from "axios";

const emit = defineEmits(["created"]);
const name = ref("");
const type = ref("");

const createTransportUnit = async () => {
    try {
        await axios.post("/transport-units", {
            name: name.value,
            type: type.value,
        });
        name.value = "";
        type.value = "";
        emit("created");
    } catch (error) {
        console.error("Error creating transport unit:", error);
    }
};
</script>
