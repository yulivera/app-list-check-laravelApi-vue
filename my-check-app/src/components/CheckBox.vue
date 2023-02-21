<script setup>
import AddListCheck from "./AddListCheck.vue"
import BoxCheck from "./BoxCheck.vue"
import { ref } from '@vue/reactivity'

const props = defineProps({ list: [], id: null });
const listP = ref([]);

function initList() {
    if (props.list)
        listP.value = props.list;
}
initList();

//funcion componente hijo AddListCheck ,listar 
var arrayN = [];
function callbackeeC(data) {
    console.log("EN PADRE");
    arrayN = listP.value;
    arrayN.push(data);
    listP.value = arrayN;
}
// function componente hijo BoxCheck, delete check
var arrayD = [];
function callbackeeDelete(id) {
    arrayD = listP.value;
    const filtered = arrayD.filter((item) => item.id !== id);
    listP.value = filtered;
}

</script>
<template>
    <BoxCheck @box-event="callbackeeDelete" v-for="(box, index) in listP" :id="box.id" :label="box.title"
        :status="box.status" />

    <div>
        <AddListCheck @check-event="callbackeeC" :id=id />
    </div>
</template>

