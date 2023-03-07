<template><!--  mostrar formulario ADD checksbox -->
    <div :class="{ active: isActive }" class="mt-1 col-12">
        <form v-on:submit.prevent="submitForm">
            <input class="form-control form-control-sm" id="title" v-model="d.title" type="text" placeholder="Hacer">

            <input class="form-control form-control-sm" id="card_id" v-model="d.card_id" type="text" hidden>

            <div class="d-flex p-2">
                <button class="btn btn-success btn-sm">Guardar</button>
                <button @click="isActive = !isActive" class="btn btn-warning btn-sm">Cancelar</button>
            </div>
        </form>
    </div>
    <!-- x mostrar v-on:click=""  -->
    <div :class="{ active: !isActive }">
        <button @click="isActive = !isActive" class="btn btn-primary btn-sm ">Agregar</button>
    </div>
</template>

<script setup>

import axios from "axios";
import { ref, onMounted } from 'vue';

const emit = defineEmits(['check-event']);
const props = defineProps({ id: Number });
const isActive = ref(true);

//variable entorno
var apiUrl = '';

onMounted(() => {
  apiUrl = process.env.VITE_API_URL || 'http://localhost:8000';
//   console.log(apiUrl);
  
});

const d = ref({
    title: '',
    status: 0,
    card_id: props.id
});

function submitForm() {
    axios.post(`${apiUrl}api/checks`, d.value)
        .then((res) => {
            // console.log(res);
            d.value.title = "";
            emit('check-event', res.data);

        })
        .catch((error) => {
            // error.response.status Check status code
        }).finally(() => {
            //Perform action in always
        });
}



</script>

<style>
.active {
    display: none;
}
</style>