<script setup>

import axios from "axios";
import AddCardList from "./AddCardList.vue"
import CheckBox from "./CheckBox.vue"

import { ref } from '@vue/reactivity'
// import 
const cards = ref([]);

function cardAll() {
    var cardsArray = [];
    axios.get("http://localhost:8000/api/cards/").then((re) => {
        cards.value = re.data;
        cardsArray = re.data;
        console.log("NUEVO:", cards.value);
    })
}
cardAll();

const picture = ref(null);

function cambio(pict) {
    console.log(pict);
}
// list to cards
function callbackee(data) {
    // console.log("EN PADRE");
    var cardsArray = [];
    cardsArray = cards.value;
    cardsArray.push(data);
    cards.value = cardsArray;
}
// delete list
var arrayD = [];
function deleteList(id) {
    axios.delete("http://localhost:8000/api/cards/" + id)
        .then((res) => {
            console.log(res);
            arrayD = cards.value;
            const filtered = arrayD.filter((item) => item.id !== id);
            cards.value = filtered;

        })
        .catch((error) => {
            // error.response.status Check status code
        }).finally(() => {
            //Perform action in always
        });
}

</script>

<template><!-- component form add list -->
    <AddCardList @some-event="callbackee" />

    <div class="row p-2">
        <div v-for="(card, index) in cards" :key="index" class="col-lg-4 col-md-6">
            <div class="card p-2 opacity-75 mb-2">
                <div ref="picture" class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ card.title }}</h5>
                        <!-- delete list cascade -->
                        <button @click="deleteList(card.id)" class="btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <!-- checkbox list -->
                    <CheckBox v-if="card.check" :list=card.check :id=card.id />
                    <CheckBox v-else :id=card.id />
                </div>
            </div>
        </div>
    </div>
</template>
