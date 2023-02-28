<template>
    <div class="col-4">
        <!-- Add lista -->
        <form @submit.prevent="submitForm">
            <input class="form-control form-control-sm" id="title" v-model="card.title" type="text"
                placeholder="Titulo de lista">
            <button type="submit" class="btn btn-primary btn-sm m-2">Guardar</button>
        </form>
    </div>
</template>

<script setup>

import axios from "axios";
import { onMounted } from 'vue';

//variable entorno
var apiUrl = '';

onMounted(() => {
  apiUrl = process.env.VITE_API_URL || 'http://localhost:8080';
//   console.log(apiUrl);
  
});

const emit = defineEmits(['some-event']);

const card = {
    title: ''
};

function submitForm() {
    axios.post(`${apiUrl}api/cards/`, card)
        .then((res) => {
            console.log(res.data);
            // component call AddCheck.vue
            emit('some-event', res.data);
        })
        .catch((error) => {
            // error.response.status Check status code
        }).finally(() => {
            //Perform action in always
        });
}

</script>