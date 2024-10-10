<template>
    <div class="container mx-auto pt-10">
        <TransportUnitForm @created="fetchTransportUnits" />
        <SearchForm @searched="handleSearch" />
        <div class="mt-10 flex space-x-4">
            <button
                @click="filterType('trailer')"
                class="px-4 py-2 bg-black text-white rounded hover:bg-opacity-70 transition duration-100 ease-in"
            >
                Show Trailers
            </button>
            <button
                @click="filterType('truck')"
                class="px-4 py-2 bg-black text-white rounded hover:bg-opacity-70 transition duration-100 ease-in"
            >
                Show Trucks
            </button>
        </div>
        <div class="mt-10">
            <TransportUnitList :units="filteredUnits" />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import TransportUnitForm from "../components/TransportUnitForm.vue";
import SearchForm from "../components/SearchForm.vue";
import TransportUnitList from "../components/TransportUnitList.vue";

const units = ref([]);
const filteredUnits = ref([]);

const fetchTransportUnits = async () => {
    try {
        const response = await axios.get("/transport-units");
        console.log("API Response:", response.data);
        units.value = response.data;
        filteredUnits.value = units.value;
    } catch (error) {
        console.error("Error fetching transport units:", error);
    }
};

const filterType = async (type) => {
    try {
        const response = await axios.get(`/transport-units/${type}`);
        filteredUnits.value = response.data;
    } catch (error) {
        console.error("Error filtering transport units:", error);
    }
};

const handleSearch = async (query) => {
    try {
        const response = await axios.get(`/search-transport-units`, {
            params: { query },
        });
        filteredUnits.value = response.data;
    } catch (error) {
        console.error("Error searching transport units:", error);
    }
};

onMounted(fetchTransportUnits);
</script>
