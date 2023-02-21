<script setup>
import axios from "axios";
import { ref } from 'vue';

const emit = defineEmits(['box-event']);

const props = defineProps(
    {
        id: null,
        label: '',
        status: 0

    });

const db = {
    status: props.status,
    title: props.label
}

function init() {
    if (props.status)
        db.status = true
    else
        db.status = false
}
init();
// Cambiar status
function statusCheck(id) {
    // console.log(db.status);

    axios.put("http://localhost:8000/api/checks/" + id, db)
        .then((res) => {
            // console.log(res.data.title);
            isActive.value = true;
            console.log("Actualizado");
        })
        .catch((error) => {
            // error.response.status Check status code
        }).finally(() => {
            //Perform action in always
        });
}
function deleteBox(id) {
    console.log(id);
    axios.delete("http://localhost:8000/api/checks/" + id)
        .then((res) => {
            console.log(res);
            emit('box-event', id);

        })
        .catch((error) => {
            // error.response.status Check status code
        }).finally(() => {
            //Perform action in always
        });
}

const input = ref([]);
const isActive = ref(true);

function focusInput() {
    isActive.value = !isActive;
    // console.log(input.value);
    input.value.focus();
}

</script>
<template>
    <div class="d-flex d-flex justify-content-between mb-2 ">
        <!-- checkbox list "-->
        <div class="d-flex">
            <div class="checkbox-wrapper-52">
                <label :for="props.id" class="item">
                    <input type="checkbox" :id="props.id" v-model="db.status" @change="statusCheck(props.id)"
                        class="hidden" />

                    <label :for="props.id" class="cbx">
                        <svg width="14px" height="12px" viewBox="0 0 14 12">
                            <polyline points="1 7.6 5 11 13 1"></polyline>
                        </svg>
                    </label>
                    <!-- open edit text -->
                    <label @click="focusInput" :class="{ active: !isActive }" class="cbx-lbl">{{ db.title }}</label>
                </label>

            </div>
            <!-- EDIT text-->
            <div :class="{ active: isActive }">
                <form @submit.prevent="statusCheck(props.id)">
                    <input ref="input" type="text" v-model="db.title">
                </form>
                <!-- close form edit -->
                <button @click="isActive = !isActive" class="btn">X</button>
            </div>
        </div>
        <div>
            <!-- delete check box  -->
            <button @click="deleteBox(props.id)" class="btn">
                <i class="fa-solid fa-minus"></i>
            </button>
        </div>
    </div>
</template>
<style>
.active {
    display: none;
}
</style>